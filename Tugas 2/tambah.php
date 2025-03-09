<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama_mahasiswa"];
    $nim = $_POST["nim"];
    $kelas = $_POST["kelas"];
    $prodi = $_POST["prodi"];

    $sql = "INSERT INTO mahasiswa (nama_mahasiswa, nim, kelas, prodi) 
            VALUES ('$nama', '$nim', '$kelas', '$prodi')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>
        <form action="" method="POST">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" required>

            <label>NIM</label>
            <input type="text" name="nim" required>

            <label>Kelas</label>
            <input type="text" name="kelas" required>

            <label>Prodi</label>
            <input type="text" name="prodi" required>

            <button type="submit">Simpan</button>
            <a href="index.php" class="cancel-btn">Batal</a>
        </form>
    </div>
</body>
</html>