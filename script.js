document.getElementById("form-tambah").addEventListener("submit", function(e) {
    const input = document.getElementById("item");
    if (input.value.trim() === "") {
        e.preventDefault();
        alert("Item tidak boleh kosong!");
    }
});
