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
    if (!tableBody) return; // Safety check

    const allRows = Array.from(tableBody.getElementsByClassName('laptop-row'));
    const filterInput = document.getElementById('filterInput');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageIndicator = document.getElementById('pageIndicator');

    function updateTable() {
        const searchTerm = filterInput.value.toLowerCase();
        
        // 1. Filter rows based on search term
        const filteredRows = allRows.filter(row => {
            return row.innerText.toLowerCase().includes(searchTerm);
        });

        // 2. Calculate pagination for the results
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage) || 1;
        
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // 3. Hide ALL rows first
        allRows.forEach(row => row.style.display = 'none');

        // 4. Show only the rows for the current page of the filtered set
        filteredRows.slice(start, end).forEach(row => {
            row.style.display = '';
        });

        // 5. Update UI
        pageIndicator.innerText = `Page ${currentPage} of ${totalPages}`;
        prevBtn.disabled = (currentPage === 1);
        nextBtn.disabled = (currentPage === totalPages);
    }

    // Single Event Listener for search
    filterInput.addEventListener('input', () => {
        currentPage = 1; 
        updateTable();
    });

    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updateTable();
        }
    });

    nextBtn.addEventListener('click', () => {
        const searchTerm = filterInput.value.toLowerCase();
        const filteredRows = allRows.filter(r => r.innerText.toLowerCase().includes(searchTerm));
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        
        if (currentPage < totalPages) {
            currentPage++;
            updateTable();
        }
    });

    updateTable();
}

// Ensure the DOM is fully loaded before running
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTable);
} else {
    initTable();
}