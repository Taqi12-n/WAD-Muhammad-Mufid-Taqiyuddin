<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM mahasiswa WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus!";
    header("Location: index.php");
}