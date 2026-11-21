<?php
include_once "koneksi.php";

if (isset($_POST['submit'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = "";

    if (isset($_FILES['file_gambar']) &&
        $_FILES['file_gambar']['error'] == 0) {

        $filename = basename($_FILES['file_gambar']['name']);
        $filename = str_replace(' ', '_', $filename);

        $destination = __DIR__ . "/gambar/" . $filename;

        if (move_uploaded_file(
            $_FILES['file_gambar']['tmp_name'],
            $destination
        )) {
            $gambar = $filename;
        }
    }

    $sql = "INSERT INTO data_barang
            (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES
            ('$nama', '$kategori', '$harga_jual',
             '$harga_beli', '$stok', '$gambar')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Tambah Barang</h1>

    <div class="main">
        <form method="post" action="tambah.php"
              enctype="multipart/form-data">

            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="nama" required>
            </div>

            <div class="input">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Komputer">Komputer</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Hand Phone">Hand Phone</option>
                </select>
            </div>

            <div class="input">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" min="0" required>
            </div>

            <div class="input">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" min="0" required>
            </div>

            <div class="input">
                <label>Stok</label>
                <input type="number" name="stok" min="0" required>
            </div>

            <div class="input">
                <label>File Gambar</label>
                <input type="file" name="file_gambar"
                       accept="image/*">
            </div>

            <div class="submit">
                <button type="submit" name="submit">Simpan</button>
                <a href="index.php">Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>