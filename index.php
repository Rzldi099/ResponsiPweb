<?php
session_start();

// Inisialisasi daftar belanja default
if (!isset($_SESSION['shopping_list'])) {
    $_SESSION['shopping_list'] = ["Beras", "Minyak Goreng", "Telur"];
}

// Menambah item
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item"])) {
    $item = trim($_POST["item"]);
    if ($item != "") {
        $_SESSION['shopping_list'][] = $item;
    }
}

// Menghapus item
if (isset($_GET["hapus"])) {
    $index = (int)$_GET["hapus"];
    if (isset($_SESSION['shopping_list'][$index])) {
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
