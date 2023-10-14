<?php
include "../inc/koneksi.php";
session_start();
if ($_SESSION['username'] == "") {
    header('location:../');
}

$qcekpass = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
$cekpass = mysqli_fetch_array($qcekpass);
if ($_SESSION['username'] == $cekpass['password']) {
    header('location:../change_password.php');
}

if ($_SESSION['status'] == "teacher") {
    header('location:../teacher/');
} elseif ($_SESSION['status'] == "student") {
    header('location:../student/');
}
$qprofile = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
$profile = mysqli_fetch_array($qprofile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMK Nusantara | Admin">
    <meta name="author" content="Asep Saepudin">


    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>SMK Nusantara - Admin</title>


    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</head>

<body id="page-top">

    <!-- wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../assets/img/brand.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SMK Nusantara</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php
            @$menu = $_GET['menu'];
            ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php
                                if ($menu == "") {
                                    echo "active";
                                }
                                ?>">
                <a class="nav-link" href="?">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php
                                if ($menu == "manage_student" || $menu == "add_student" || $menu == "eStudent" || $menu == "manage_teacher" || $menu == "add_teacher" || $menu == "eTeacher" || $menu == "manage_class" || $menu == "manage_schedule" || $menu == "add_schedule") {
                                    echo "active";
                                }
                                ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?menu=manage_student">Student</a>
                        <a class="collapse-item" href="?menu=manage_teacher">Teacher</a>
                        <a class="collapse-item" href="?menu=manage_class">Class</a>
                        <a class="collapse-item" href="?menu=manage_schedule">Schedule</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Finalize Schedule -->
            <li class="nav-item <?php
                                if ($menu == "finalize_schedule") {
                                    echo "active";
                                }
                                ?>">
                <a class="nav-link" href="?menu=finalize_schedule">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Finalize Schedule</span></a>
            </li>
            <!-- Nav Item - Input Score -->
            <li class="nav-item <?php
                                if ($menu == "report_score") {
                                    echo "active";
                                }
                                ?>">
                <a class="nav-link" href="?menu=report_score">
                    <i class="fas fa-fw fa-signal"></i>
                    <span>View Report Score</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $profile['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../uploads/<?= $profile['Photo']; ?>" alt="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="?menu=profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    switch ($menu) {
                        case 'manage_student':
                            include "menu/manage_student.php";
                            break;

                        case 'add_student':
                            include "menu/add_student.php";
                            break;

                        case 'edit_student':
                            // include "menu/edit_student.php";
                            $id_student = $_GET['studentId'];
                            $_SESSION['id_student'] = $id_student;
                    ?>
                            <script>
                                location.href = "?menu=eStudent";
                            </script>
                        <?php
                            break;

                        case 'eStudent':
                            include "menu/edit_student.php";
                            break;

                        case 'delete_student':
                            $id = $_POST['id'];
                            mysqli_query($koneksi, "DELETE FROM tbl_student WHERE StudentID='$id'");
                            mysqli_query($koneksi, "DELETE FROM tbl_user WHERE username='$id'");
                            break;

                        case 'manage_teacher':
                            include "menu/manage_teacher.php";
                            break;

                        case 'add_teacher':
                            include "menu/add_teacher.php";
                            break;

                        case 'edit_teacher':
                            // include "menu/edit_teacher.php";
                            $id_teacher = $_GET['teacherId'];
                            $_SESSION['id_teacher'] = $id_teacher;
                        ?>
                            <script>
                                location.href = "?menu=eTeacher";
                            </script>
                    <?php
                            break;

                        case 'eTeacher':
                            include "menu/edit_teacher.php";
                            break;

                        case 'delete_teacher':
                            $id = $_POST['id'];
                            mysqli_query($koneksi, "DELETE FROM tbl_teacher WHERE TeacherID='$id'");
                            mysqli_query($koneksi, "DELETE FROM tbl_user WHERE username='$id'");
                            break;

                        case 'manage_class':
                            include "menu/manage_class.php";
                            break;

                        case 'manage_schedule':
                            include "menu/manage_schedule.php";
                            break;

                        case 'add_schedule':
                            include "menu/add_schedule.php";
                            break;

                        case 'finalize_schedule':
                            include "menu/finalize_schedule.php";
                            break;

                        case 'report_score':
                            include "menu/report_score.php";
                            break;

                        case 'profile':
                            include "menu/profile.php";
                            break;

                        default:
                            include "menu/dashboard.php";
                            break;
                    }
                    ?>

                </div>
                <!-- end of begin page content -->

            </div>
            <!-- end of main content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Warung Coding TV 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- end of Content Wrapper -->

    </div>
    <!-- end of wrapper -->





    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin akan keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../inc/keluar.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
    <!-- Page level custom scripts
    <script src="../assets/js/chart/charts.js"></script> -->

</body>

</html>