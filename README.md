# 💻 Laptap Shop Price Tracker & Scraper

I scraped laptap.com.ph using Golang, Colly. Displayed via Hugo. I want simplier visualization with better filter functions than their website.

---

## 🛠️ Setup & Usage

### Pre-requisites
    Golang version 1.24.0 for Colly
    Hugo framework 

### 1. Run the Scraper

Navigate to the scraper directory and run the Go program. This will visit the site, parse all 11 pages, and update the data file.

```bash
project-folder$ cd scraper
project-folder$ go run main.go

```

### 2. Launch the Web Interface

Once the `scraped.yml` is updated, start the Hugo server to view your table.

```bash
project-folder$ hugo server

```

Visit `http://localhost:1313` to see the live tracker.


---

## 📂 Project Structure

```bash
.
├── data/
│   └── laptops/
│       └── scraped.yml      # Final output of the scraper
├── layouts/
│   └── index.html           # Hugo template with JS pagination logic
├── scraper/
│   ├── main.go              # The Go Colly scraper logic
│   ├── go.mod               # Go dependencies (Colly, YAML.v3)
└── assets/
    ├── js/main.js           # Client-side search and pagination
    └── css/app.css          # Theme and table styling

```

---
