// Tambahkan event listener ke form saat disubmit
document.getElementById("form-tambah").addEventListener("submit", function(e) {
    // Ambil elemen input teks
    const input = document.getElementById("item");

    // Cek apakah input kosong (hanya berisi spasi)
    if (input.value.trim() === "") {
        e.preventDefault(); // Hentikan pengiriman form ke server
        alert("Item tidak boleh kosong!"); // Tampilkan peringatan
    }
});
