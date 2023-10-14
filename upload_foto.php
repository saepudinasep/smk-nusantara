<?php
include "inc/koneksi.php";
session_start();
if ($_SESSION['username'] == "") {
    header('location:index.php');
}

if ($_SESSION['status'] == 'admin') {
    $role = 'tbl_user';
} elseif ($_SESSION['status'] == 'student') {
    $role = 'tbl_student';
} elseif ($_SESSION['status'] == 'teacher') {
    $role = 'tbl_teacher';
}
$qprofile = mysqli_query($koneksi, "SELECT * FROM $role WHERE username = '$_SESSION[username]'");
$profile = mysqli_fetch_array($qprofile);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMK Nusantara | Upload Photos">
    <meta name="author" content="Asep Saepudin">
    <meta content="smk nusantara,sekolah,belajar,kuliah" name="keywords">


    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>SMK Nusantara - Upload Photos</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hello <?= $profile['Name']; ?></h1>
                                        <p>please upload your photo</p>
                                    </div>
                                    <form class="user" role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" class="form-control p-1" id="fileInput" name="file">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Upload Photos</button>
                                    </form>
                                    <?php
                                    // cek apakah tombol submit sudah ditekan atau belum
                                    if (isset($_POST['submit'])) {
                                        // ambil data file dari form
                                        $file = $_FILES['file'];

                                        // ambil informasi file
                                        $fileName = $file['name'];
                                        $fileType = $file['type'];
                                        $fileTempName = $file['tmp_name'];
                                        $fileError = $file['error'];
                                        $fileSize = $file['size'];

                                        // explode file name untuk mendapatkan ekstensi file
                                        $fileExt = explode('.', $fileName);
                                        $fileActualExt = strtolower(end($fileExt));

                                        // daftar ekstensi file yang diizinkan
                                        $allowed = array('jpg', 'jpeg', 'png');

                                        // cek apakah ekstensi file diizinkan
                                        if (in_array($fileActualExt, $allowed)) {
                                            // cek apakah ada error pada file
                                            if ($fileError === 0) {
                                                // cek apakah file size terlalu besar
                                                if ($fileSize < 1000000) {
                                                    // generate nama file baru
                                                    // mengganti generate dengan tanggal waktu saat ini
                                                    $fileNameNew = date("dmYHis") . "." . $fileActualExt;
                                                    // tentukan lokasi file akan diupload
                                                    $fileDestination = 'uploads/' . $fileNameNew;
                                                    // pindahkan file temporary ke lokasi tujuan
                                                    move_uploaded_file($fileTempName, $fileDestination);
                                                    mysqli_query($koneksi, "UPDATE tbl_user SET Photo='$fileNameNew' WHERE username = '$_SESSION[username]'");
                                                    if ($_SESSION['status'] == "admin") {
                                                        header('location:admin/');
                                                    } elseif ($_SESSION['status'] == "teacher") {
                                                        header('location:teacher/');
                                                    } elseif ($_SESSION['status'] == "student") {
                                                        header('location:student/');
                                                    }
                                                } else {
                                    ?>
                                                    <hr>
                                                    <div class="text-center text-danger">
                                                        File too big. Maximum file size is 1MB.
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <hr>
                                                <div class="text-center text-danger">
                                                    There is an error in the file you uploaded. Please try again.
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <hr>
                                            <div class="text-center text-danger">
                                                The file extension you uploaded is not allowed. Only files with JPG, JPEG and PNG extensions are allowed.
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>