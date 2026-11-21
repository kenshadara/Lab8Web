<?php
include_once "koneksi.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql = "SELECT * FROM data_barang WHERE id_barang = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data barang tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = $data['gambar'];

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

    $sql = "UPDATE data_barang SET
            nama = '$nama',
            kategori = '$kategori',
            harga_jual = '$harga_jual',
            harga_beli = '$harga_beli',
            stok = '$stok',
            gambar = '$gambar'
            WHERE id_barang = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Ubah Barang</h1>

    <div class="main">
        <form method="post" action="ubah.php?id=<?= $id ?>"
              enctype="multipart/form-data">

            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="nama"
                    value="<?= htmlspecialchars($data['nama']); ?>"
                    required>
            </div>

            <div class="input">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="Komputer"
                        <?= $data['kategori'] == 'Komputer' ? 'selected' : '' ?>>
                        Komputer
                    </option>

                    <option value="Elektronik"
                        <?= $data['kategori'] == 'Elektronik' ? 'selected' : '' ?>>
                        Elektronik
                    </option>

                    <option value="Hand Phone"
                        <?= $data['kategori'] == 'Hand Phone' ? 'selected' : '' ?>>
                        Hand Phone
                    </option>
                </select>
            </div>

            <div class="input">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual"
                    value="<?= $data['harga_jual']; ?>" required>
            </div>

            <div class="input">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli"
                    value="<?= $data['harga_beli']; ?>" required>
            </div>

            <div class="input">
                <label>Stok</label>
                <input type="number" name="stok"
                    value="<?= $data['stok']; ?>" required>
            </div>

            <div class="input">
                <label>File Gambar (opsional)</label>
                <input type="file" name="file_gambar"
                    accept="image/*">
            </div>

            <div class="submit">
                <button type="submit" name="submit">Simpan Perubahan</button>
                <a href="index.php">Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>