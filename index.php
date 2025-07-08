<?php
// Memulai sesi untuk menyimpan data pengguna sementara
session_start();

// Mengecek apakah session 'shopping_list' belum dibuat
if (!isset($_SESSION['shopping_list'])) {
    // Jika belum, inisialisasi dengan 3 item default
    $_SESSION['shopping_list'] = ["Beras", "Minyak Goreng", "Telur"];
}

// Mengecek apakah form dikirim dengan metode POST dan field 'item' terisi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item"])) {
    // Ambil input dari user dan hilangkan spasi di awal/akhir
    $item = trim($_POST["item"]);

    // Jika input tidak kosong, tambahkan ke daftar belanja (session)
    if ($item != "") {
        $_SESSION['shopping_list'][] = $item;
    }
}

// Mengecek apakah ada permintaan hapus item lewat URL (GET)
if (isset($_GET["hapus"])) {
    // Ambil indeks item yang ingin dihapus dari parameter 'hapus'
    $index = (int)$_GET["hapus"];

    // Pastikan item dengan indeks tersebut memang ada
    if (isset($_SESSION['shopping_list'][$index])) {
        // Hapus item dari array menggunakan array_splice
        array_splice($_SESSION['shopping_list'], $index, 1);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Belanja Interaktif</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🛒 Daftar Belanja</h1>

        <form method="post" id="form-tambah">
            <input type="text" name="item" id="item" placeholder="Masukkan item baru">
            <button type="submit">Tambah</button>
        </form>

        <ul id="shopping-list">
            <?php foreach ($_SESSION['shopping_list'] as $index => $item): ?>
                <li>
                    <?= htmlspecialchars($item) ?>
                    <a href="?hapus=<?= $index ?>" class="hapus">Hapus</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="script.js"></script>
</body>
</html>
