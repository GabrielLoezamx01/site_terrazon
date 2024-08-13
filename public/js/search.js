document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("searchInput");
    var tableRows = document.querySelectorAll("#myTable tbody tr");

    searchInput.addEventListener("keyup", function () {
        var value = this.value.toLowerCase();

        tableRows.forEach(function (row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.indexOf(value) > -1 ? "" : "none";
        });
    });
});
