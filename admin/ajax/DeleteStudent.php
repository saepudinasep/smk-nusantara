<?php
include "../../inc/koneksi.php";
// $category = $_POST["cmbCategory"];

$studentId = $_POST['studentId'];
$kelas = $_POST['kelas'];

// Query untuk mengambil data

$query = "DELETE FROM tbl_detailclass WHERE StudentID = '" . $studentId . "' AND ClassName = '" . $kelas . "'";
mysqli_query($koneksi, $query);

echo "Data Deleted successfully!";
