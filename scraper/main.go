package main

import (
	"encoding/json"
	"log"
	"os"
	"fmt"
	"time"
	"strings"
	"github.com/gocolly/colly/v2"
	"gopkg.in/yaml.v3"
)

type ShopifyVariant struct {
	ID        int64  `json:"id"`
	Title     string `json:"title"`
	Price     int    `json:"price"`
	Available bool   `json:"available"`
	SKU       string `json:"sku"`
}

type Laptop struct {
	Name      string `yaml:"name"`
	Specs     string `yaml:"specs"`
	CPU       string `yaml:"cpu"`
    RAM       string `yaml:"ram"`
    Storage   string `yaml:"storage"`
    Extra     string `yaml:"extra"`
	Price     int    `yaml:"price"`
	URL       string `yaml:"url"`
}

func main() {
	c := colly.NewCollector(
		colly.AllowedDomains("www.laptap.com.ph"),
		colly.UserAgent("Mozilla/5.0"),
    )

    // Limit crawling speed as to nto get blocked
    c.Limit(&colly.LimitRule{
        DomainGlob:  "*",
        Parallelism: 2,
		Delay:       1 * time.Second,
    })	
	
	var allLaptops []Laptop

	// Get links from collection list
	c.OnHTML("a.full-unstyled-link", func(e *colly.HTMLElement) {
		link := e.Attr("href")
		fullURL := e.Request.AbsoluteURL(link)
		
		// log.Printf("Found Link: %s", fullURL)
		e.Request.Visit(fullURL)
		// fmt.Println(e.Text)
	})

	// Visit product web page from collection list
	// Take json
	c.OnHTML("variant-radios", func(e *colly.HTMLElement) {
		jsonText := e.ChildText("script[type='application/json']")
		
		var variants []ShopifyVariant
		err := json.Unmarshal([]byte(jsonText), &variants)
		if err != nil {
			log.Printf("JSON Error at %s: %v", e.Request.URL, err)
			return
		}

		// Get the common Product Name for all these variants
		productName := e.DOM.ParentsUntil("body").Find("h1").First().Text()
		productName = strings.TrimSpace(productName)
		

		// Loop through every object in the JSON array
		for _, v := range variants {
			if v.Title == "" {
                continue
            }

            // data cleaning
            rawSpecs := strings.Trim(v.Title, "() ")
            parts := strings.Split(rawSpecs, ",")

            laptop := Laptop{
                Name:      productName,
                Price:     v.Price / 100,
                URL:       e.Request.URL.String(),
            }

            // mapping parts
            if len(parts) > 0 {
                laptop.CPU = strings.TrimSpace(parts[0])
            }
            if len(parts) > 1 {
                laptop.RAM = strings.TrimSpace(parts[1])
            }
            if len(parts) > 2 {
                laptop.Storage = strings.TrimSpace(parts[2])
            }
            if len(parts) > 3 {
                laptop.Extra = strings.TrimSpace(strings.Join(parts[3:], ", "))
            }

            allLaptops = append(allLaptops, laptop)
            log.Printf("Parsed: %s | CPU: %s | RAM: %s", laptop.Name, laptop.CPU, laptop.RAM)
        }

	})

    // Debugging logs
    c.OnResponse(func(r *colly.Response) {
        log.Printf("Visited %s | Status: %d", r.Request.URL, r.StatusCode)
    })

	log.Println("Scraper started...")

    for i := 1; i <= 11; i++ {
        targetURL := fmt.Sprintf("https://www.laptap.com.ph/collections/laptop/Laptops?page=%d", i)
        
        log.Printf("--- STARTING PAGE %d ---", i)
        
        err := c.Visit(targetURL)
        if err != nil {
            log.Printf("Error visiting page %d: %v", i, err)
            continue
        }

        c.Wait()
        
        log.Printf("--- FINISHED PAGE %d ---", i)
    }

    saveToYaml(allLaptops)
}

func saveToYaml(data []Laptop) {
	file, err := yaml.Marshal(data)
	if err != nil {
		log.Fatal(err)
	}
	_ = os.WriteFile("../data/laptops/scraped.yml", file, 0644)
	log.Println("Successfully saved data to Hugo!")
}