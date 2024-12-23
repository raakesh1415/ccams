window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            labels: {
                placeholder: "Cari...", // Search input placeholder
                perPage: "Tunjuk rekod setiap halaman", // Pagination dropdown
                noRows: "Tiada rekod dijumpai", // No rows message
                info: "Memaparkan {start} hingga {end} daripada {rows} rekod", // Table footer info
                next: "Seterusnya", // Next page button
                previous: "Sebelumnya" // Previous page button
            }
        });
    }
});
