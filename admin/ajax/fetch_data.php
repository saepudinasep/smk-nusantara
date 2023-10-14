<?php
include "../../inc/koneksi.php";
$category = $_POST["cmbCategory"];

// Query untuk mengambil data
$query = "SELECT * FROM tbl_student as ts, tbl_class as tc
WHERE EXISTS (SELECT 1 FROM tbl_detailclass as dc WHERE ts.StudentID = dc.StudentID AND tc.ClassName = dc.ClassName AND dc.ClassName = '$category') ORDER BY ts.StudentID";
$result = mysqli_query($koneksi, $query);

$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr style='cursor:pointer;'>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $row["StudentID"] . "</td>";
    echo "<td>" . $row["Name"] . "</td>";
    echo "</tr>";
}
?>

<script>
    $("#tableData tr").click(function() {
        id = $(this).find("td:eq(1)").text();
        $("#studentId").val(id);

        // Mengatur status tombol
        setButtonStatus(true, false);
    });
</script>