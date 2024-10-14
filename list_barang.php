<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

$sql = "SELECT * FROM produk_electronics";
$result = $conn->query($sql);
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
    <h1 class="text-center mb-4">List Barang Elektronik</h1>
    
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                            <p class="card-text"><strong>Kategori:</strong> <?php echo $row['kategori']; ?></p>
                            <p class="card-text"><strong>Harga:</strong> Rp <?php echo $row['harga']; ?></p>
                            <p class="card-text"><strong>Stok:</strong> <?php echo $row['stok']; ?></p>
                            <p class="card-text"><strong>Merk:</strong> <?php echo $row['merk']; ?></p>
                            <a href="detail_barang.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada barang.</p>
        <?php endif; ?>
    </div>
    
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Kembali ke Home</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>