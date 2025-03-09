<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="table-container">
        <h2>Data Mahasiswa</h2>
        <table border="2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $sql = "SELECT * FROM mahasiswa";
            $result = mysqli_query($conn, $sql);
            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_mahasiswa']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['kelas']}</td>
                        <td>{$row['prodi']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a> 
                            <a href='hapus.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Apakah Anda Yakin?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
        <br>
        <a href="tambah.php" class="add-btn">Tambah Data</a>
    </div>
</body>
</html>
