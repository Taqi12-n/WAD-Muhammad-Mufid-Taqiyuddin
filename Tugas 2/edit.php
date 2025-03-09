<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM mahasiswa WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label>Nama Mahasiswa:</label>
            <input type="text" name="nama_mahasiswa" value="<?php echo $row['nama_mahasiswa']; ?>" required>

            <label>NIM:</label>
            <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required>

            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required>

            <label>Prodi:</label>
            <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>" required>

            <button type="submit" name="update">Update</button>
            <a href="index.php" class="cancel-btn">Batal</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $nama = $_POST['nama_mahasiswa'];
            $nim = $_POST['nim'];
            $kelas = $_POST['kelas'];
            $prodi = $_POST['prodi'];

            $sql = "UPDATE mahasiswa SET nama_mahasiswa='$nama', nim='$nim', kelas='$kelas', prodi='$prodi' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "<p>Data berhasil diperbarui!</p>";
                header("Location: index.php");
                exit();
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
