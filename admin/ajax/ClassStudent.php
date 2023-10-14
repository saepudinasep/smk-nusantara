<?php
include "../../inc/koneksi.php";
// $category = $_POST["cmbCategory"];

$studentId = $_POST['studentId'];
$kelas = $_POST['kelas'];

// Query untuk mengambil data

$query = "INSERT INTO tbl_detailclass (DetailClassID, ClassName, StudentID) VALUES (NULL, '" . $kelas . "', '" . $studentId . "')";
mysqli_query($koneksi, $query);

echo "Data saved successfully!";
