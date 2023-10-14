<?php
session_start();
require "inc/koneksi.php";

// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['status'])) {
    $username = $_COOKIE['username'];
    $status = $_COOKIE['status'];

    // ambil status berdasarkan username
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan status
    if ($status === hash('sha256', $row['role'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['role'];
    }
}

if (isset($_SESSION["login"])) {
    if (@$_SESSION['username'] != "") {
        if ($_SESSION['status'] == "admin") {
            header('location:admin/');
        } elseif ($_SESSION['status'] == "teacher") {
            header('location:teacher/');
        } elseif ($_SESSION['status'] == "student") {
            header('location:student/');
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMK Nusantara | Login">
    <meta name="author" content="Asep Saepudin">
    <meta content="smk nusantara,sekolah,belajar,kuliah" name="keywords">


    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>SMK Nusantara - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-img-login"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SMK Nusantara</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                <label class="custom-control-label" for="remember">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="flogin" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['flogin'])) {
                                        $user = $_POST['username'];
                                        $pass = $_POST['password'];

                                        $qlogin = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$user' OR password='$pass'");
                                        $cek = mysqli_num_rows($qlogin);
                                        $data = mysqli_fetch_array($qlogin);
                                        // cek apakah data ada
                                        if ($cek < 1) {
                                    ?>
                                            <hr>
                                            <div class="text-center text-danger">
                                                Maaf Username atau Password Tidak Cocok
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#username").addClass("is-invalid");
                                                    $("#password").addClass("is-invalid");
                                                });
                                            </script>
                                            <?php
                                        } else {
                                            // set session
                                            $_SESSION['login'] = true;
                                            $_SESSION['username'] = $data['username'];
                                            $_SESSION['status'] = $data['role'];

                                            // cek remember me
                                            if (isset($_POST['remember'])) {
                                                // buat cookie yang disimpan selama 1 minggu
                                                setcookie('username', $data['username'], time() + (30 * 24 * 60 * 60), "/");
                                                setcookie('status', hash('sha256', $data['role']), time() + (30 * 24 * 60 * 60), "/");
                                            }

                                            if ($user == $data['username']) {
                                                if ($pass == $data['password']) {
                                                    if ($user == $pass) {
                                                        header('location:change_password.php');
                                                    } else {
                                                        if ($data['role'] == "admin") {
                                                            header('location:admin/');
                                                        } elseif ($data['role'] == "teacher") {
                                                            header('location:teacher/');
                                                        } elseif ($data['role'] == "student") {
                                                            header('location:student/');
                                                        }
                                                    }
                                                } else {
                                            ?>
                                                    <hr>
                                                    <div class="text-center text-danger">
                                                        Maaf Password Tidak Cocok
                                                    </div>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $("#username").addClass("is-valid");
                                                            $("#password").addClass("is-invalid");
                                                        });
                                                    </script>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <hr>
                                                <div class="text-center text-danger">
                                                    Maaf Username Tidak Cocok
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#username").addClass("is-invalid");
                                                        $("#password").addClass("is-valid");
                                                    });
                                                </script>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <!-- <hr>
                                    <div class="text-center text-danger">
                                        Username Salah
                                    </div> -->
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