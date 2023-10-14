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
    <meta name="description" content="SMK Nusantara | Change Password">
    <meta name="author" content="Asep Saepudin">
    <meta content="smk nusantara,sekolah,belajar,kuliah" name="keywords">


    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>SMK Nusantara - Change Password</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- My Javascript -->
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
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hello <?= $profile['Name']; ?></h1>
                                        <p>please change your default password</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="default_pass" name="default_pass" placeholder="Default Password">
                                            <small class=" form-text text-muted">The default password should not be wrong</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="new_pass" name="new_pass" placeholder="New Password">
                                            <small class=" form-text text-muted">The password must contain at least 8 characters</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="confirm_pass" name="confirm_pass" placeholder="Confirmation Password">
                                            <small class=" form-text text-muted">Make sure the confirmation password is the same as the new password</small>
                                        </div>
                                        <button type="submit" name="change_pass" class="btn btn-primary btn-user btn-block">Change Password</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['change_pass'])) {
                                        $default_pass = $_POST['default_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $confirm_pass = $_POST['confirm_pass'];

                                        $qcekpass = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
                                        $cekpass = mysqli_fetch_array($qcekpass);
                                        if ($default_pass == $cekpass['password']) {
                                            if ($confirm_pass == $new_pass) {
                                                // Update password
                                                mysqli_query($koneksi, "UPDATE tbl_user SET password = '$new_pass' WHERE username = '$_SESSION[username]'");
                                                header('location:upload_foto.php');
                                            } else {
                                    ?>
                                                <hr>
                                                <div class="text-center text-danger">
                                                    The confirmation password is not the same.
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#confirm_pass").addClass("is-invalid");
                                                        // $("#new_password").addClass("is-invalid");
                                                    });
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <hr>
                                            <div class="text-center text-danger">
                                                The default password is not the same.
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#default_pass").addClass("is-invalid");
                                                    // $("#new_password").addClass("is-invalid");
                                                });
                                            </script>
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

    <!-- My Javascript -->
    <script>
        $(document).ready(function() {
            // $("#default_pass").keyup(function() {
            //     if (this.value.length >= 8) {
            //         $("#default_pass").addClass("is-valid");
            //         $("#default_pass").removeClass("is-invalid");
            //     } else {
            //         $("#default_pass").removeClass("is-valid");
            //         $("#default_pass").addClass("is-invalid");
            //     }
            // })

            $("#new_pass").keyup(function() {
                if (this.value.length >= 8) {
                    $("#new_pass").addClass("is-valid");
                    $("#new_pass").removeClass("is-invalid");
                } else {
                    $("#new_pass").removeClass("is-valid");
                    $("#new_pass").addClass("is-invalid");
                }
            })

            $("#confirm_pass").keyup(function() {
                var new_pass = $("#new_pass").val();
                var confirm_pass = $("#confirm_pass").val();

                if (new_pass != confirm_pass) {
                    $("#confirm_pass").removeClass("is-valid");
                    $("#confirm_pass").addClass("is-invalid");
                } else {
                    $("#confirm_pass").addClass("is-valid");
                    $("#confirm_pass").removeClass("is-invalid");
                }
            })
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>