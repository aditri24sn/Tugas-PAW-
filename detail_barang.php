<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produk_electronics WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Barang tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Barang tidak valid.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Barang</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
            <p class="card-text"><strong>Kategori:</strong> <?php echo $row['kategori']; ?></p>
            <p class="card-text"><strong>Harga:</strong> Rp <?php echo $row['harga']; ?></p>
            <p class="card-text"><strong>Stok:</strong> <?php echo $row['stok']; ?></p>
            <p class="card-text"><strong>Merk:</strong> <?php echo $row['merk']; ?></p>
            <p class="card-text"><strong>Garansi:</strong> <?php echo $row['garansi']; ?> tahun</p>
            <p class="card-text"><strong>Tanggal Rilis:</strong> <?php echo $row['tanggal_rilis']; ?></p>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="list_barang.php" class="btn btn-secondary">Kembali ke List Barang</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
