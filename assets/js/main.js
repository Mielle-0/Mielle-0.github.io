

function filterTable() {
    let input = document.getElementById("filterInput");
    let filter = input.value.toUpperCase();
    let table = document.getElementById("laptopTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let rowText = tr[i].textContent || tr[i].innerText;
        if (rowText.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

const currentTheme = localStorage.getItem('theme') || 
                    (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

if (currentTheme === 'dark') {
    document.documentElement.setAttribute('data-theme', 'dark');
}

function toggleTheme() {
    let theme = document.documentElement.getAttribute('data-theme');
    if (theme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }
}



// Pagination
const rowsPerPage = 10;
let currentPage = 1;

function initTable() {
    const tableBody = document.getElementById('tableBody');
    const allRows = Array.from(tableBody.getElementsByClassName('laptop-row'));
    const filterInput = document.getElementById('filterInput');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageIndicator = document.getElementById('pageIndicator');

    function updateTable() {
        const searchTerm = filterInput.value.toLowerCase();
        
        // 1. Filter rows first
        const filteredRows = allRows.filter(row => {
            return row.innerText.toLowerCase().includes(searchTerm);
        });

        // 2. Calculate total pages for the filtered set
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage) || 1;
        
        // Ensure current page doesn't exceed total pages after filtering
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        // 3. Determine which rows to show
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // 4. Toggle visibility
        allRows.forEach(row => row.style.display = 'none'); // Hide everything
        filteredRows.slice(start, end).forEach(row => row.style.display = ''); // Show current page

        // 5. Update UI controls
        pageIndicator.innerText = `Page ${currentPage} of ${totalPages}`;
        prevBtn.disabled = (currentPage === 1);
        nextBtn.disabled = (currentPage === totalPages);
    }

    // Attach Listeners
    filterInput.addEventListener('input', () => {
        currentPage = 1; // Go to first page when searching
        updateTable();
    });

    prevBtn.addEventListener('click', () => {
        currentPage--;
        updateTable();
    });

    nextBtn.addEventListener('click', () => {
        currentPage++;
        updateTable();
    });

    // Run once on load
    updateTable();
}

// Ensure the DOM is fully loaded before running
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTable);
} else {
    initTable();
}