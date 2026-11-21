<?php
include "koneksi.php";

$sql = "SELECT * FROM data_barang ORDER BY id_barang ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Data Barang</h1>

    <a href="tambah.php" class="btn">+ Tambah Barang</a>

    <div class="main">
        <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            <?php if ($result && mysqli_num_rows($result) > 0): ?>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="gambar/<?=
                            htmlspecialchars($row['gambar']); ?>"
                            width="70" alt="Gambar barang">
                        <?php else: ?>
                            Tidak ada gambar
                        <?php endif; ?>
                    </td>

                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['kategori']); ?></td>
                    <td><?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td><?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td><?= $row['stok']; ?></td>

                    <td>
                        <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                        |
                        <a href="hapus.php?id=<?= $row['id_barang']; ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="7">Belum ada data barang.</td>
                </tr>
            <?php endif; ?>

        </table>
    </div>
</div>

</body>
</html>