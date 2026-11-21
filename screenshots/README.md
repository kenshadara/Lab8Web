# LAPORAN PRAKTIKUM 8
## PHP dan Database MySQL

### Identitas
- **Nama:** Kensha Dara Riafinola
- **NIM:** (Isi NIM kamu)
- **Program Studi:** Teknik Informatika
- **Mata Kuliah:** Pemrograman Web

---

## A. Tujuan Praktikum

1. Memahami konsep dasar Database.
2. Memahami konsep dasar CRUD menggunakan PHP.
3. Membuat program CRUD sederhana menggunakan PHP.

## B. Alat dan Bahan

- Visual Studio Code
- XAMPP
- PHP
- MySQL
- phpMyAdmin
- Browser
- GitHub

## C. Langkah-Langkah Praktikum

### 1. Menjalankan XAMPP

Menjalankan Apache dan MySQL melalui XAMPP Control Panel sebagai persiapan untuk membuat aplikasi CRUD.

![XAMPP Control Panel](screenshots/01-xampp.png)

### 2. Membuat Database

Membuat database dengan nama `latihan1` melalui phpMyAdmin menggunakan perintah SQL:

```sql
CREATE DATABASE latihan1;
```

![Membuat Database](screenshots/02-database.png)

### 3. Membuat Tabel Data Barang

Membuat tabel `data_barang` dengan beberapa field, yaitu id_barang, kategori, nama, gambar, harga_beli, harga_jual, dan stok.

![Tabel Data Barang](screenshots/03-tabel.png)

### 4. Menambahkan Data Awal

Memasukkan tiga data barang ke dalam tabel data_barang, yaitu HP Samsung Android, HP Xiaomi Android, dan HP OPPO Android.

![Data Awal](screenshots/04-data-awal.png)

### 5. Membuat Folder Project

Membuat folder project bernama `lab8_php_database` di dalam direktori `htdocs` XAMPP.

![Folder Project](screenshots/05-folder.png)

### 6. Membuat Koneksi Database

Membuat file `koneksi.php` untuk menghubungkan program PHP dengan database MySQL menggunakan fungsi `mysqli_connect()`.

![Koneksi Database](screenshots/06-koneksi.png)

### 7. Menampilkan Data Barang (Read)

Membuat file `index.php` untuk menampilkan seluruh data barang dari database menggunakan perintah SELECT.

![Menampilkan Data](screenshots/07-read.png)

### 8. Menambahkan Data Barang (Create)

Membuat file `tambah.php` untuk menambahkan data barang baru ke dalam database menggunakan perintah INSERT.

![Tambah Barang](screenshots/08-create.png)

### 9. Mengubah Data Barang (Update)

Membuat file `ubah.php` untuk mengubah informasi barang yang sudah tersimpan menggunakan perintah UPDATE.

![Ubah Barang](screenshots/09-update.png)

### 10. Menghapus Data Barang (Delete)

Membuat file `hapus.php` untuk menghapus data barang dari database menggunakan perintah DELETE.

![Hapus Barang](screenshots/10-delete.png)

### 11. Membuat Tampilan CSS

Membuat file `style.css` untuk mengatur tampilan aplikasi agar lebih rapi dan mudah digunakan.

![Tampilan CSS](screenshots/11-css.png)

## D. Struktur Folder

```text
lab8_php_database/
│
├── gambar/
├── screenshots/
├── koneksi.php
├── index.php
├── tambah.php
├── ubah.php
├── hapus.php
├── style.css
└── README.md
```

## E. Hasil Praktikum

Berdasarkan praktikum yang telah dilakukan, berhasil dibuat aplikasi pengelolaan data barang menggunakan PHP dan database MySQL.

Aplikasi memiliki empat fungsi utama CRUD, yaitu:

1. Create: Menambahkan data barang.
2. Read: Menampilkan data barang.
3. Update: Mengubah data barang.
4. Delete: Menghapus data barang.

## F. Kesimpulan

Melalui praktikum ini, mahasiswa dapat memahami penggunaan database MySQL serta penerapan operasi CRUD menggunakan PHP. Dengan demikian, mahasiswa dapat membuat aplikasi sederhana yang mampu mengelola data secara terstruktur menggunakan database.
