<?php
$result = mysqli_query($koneksi, "SELECT MAX(TeacherID) as max_id FROM tbl_teacher WHERE TeacherID LIKE 'TCHR%'");
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];

if ($max_id == '') {
    $id_baru = 'TCHR0001';
} else {
    $angka = substr($max_id, 4);
    $angka_baru = $angka + 1;
    $id_baru = 'TCHR' . sprintf('%04s', $angka_baru);
}

?>

<!-- Form Teacher -->
<div class="card shadow mb-4 form-student">
    <div class="card-header text-center">
        <h1 class="h4 mb-0 text-gray-800">Form Teacher</h1>
    </div>
    <div class="card-body">
        <form method="POST" id="form_data" class="">
            <div class="row g-3">
                <div class="col-md-6 mb-4">
                    <label for="id" class="form-label">Teacher ID</label>
                    <input type="text" class="form-control" id="id" name="id" readonly="true" value="<?= $id_baru; ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="DTO" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="DTO" name="DTO">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="gender" class="form-label">Gender</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="m" value="m" checked>
                        <label class="form-check-label" for="m">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="f" value="f">
                        <label class="form-check-label" for="f">Female</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    <p class="text-small text-muted mt-2">Maksimum text <span id="text-address"> 150 karakter </span></p>
                </div>
            </div>
            <!-- button -->
            <div class="row justify-content-center">
                <div class="col-md-3 mb-2">
                    <!-- <form method="POST"> -->
                    <button type="submit" class="btn btn-success w-50" id="save" name="save">
                        <span class="icon text-white-50">
                            <i class="fas fa-save" id="save2"></i>
                        </span>
                        <b id="text-save">Save</b>
                    </button>
                    <!-- </form> -->
                </div>

                <div class="col-md-3 mb-2">
                    <a href="?menu=manage_teacher" class="btn btn-danger w-50">
                        <span class="icon text-white-50">
                            <i class="fas fa-undo"></i>
                        </span>
                        Cancel
                    </a>
                </div>
            </div>
            <!--  -->
        </form>
    </div>


</div>
<!-- end of form student -->


<script>
    $("#name").keyup(function(event) {
        var inputValue = event.target.value;
        var regex = /^[a-zA-Z\s]+$/;
        if (!regex.test(inputValue)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mohon masukkan huruf saja!'
            });
            $(this).val("");
        }
    });

    $("#phone_number").keyup(function() {
        var inputValue = $(this).val();
        if (!$.isNumeric(inputValue)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mohon masukkan angka saja!'
            });
            $(this).val("");
        }
    });

    $('#address').keyup(function() {
        var max = 150;
        var len = $(this).val().length;
        if (len >= max) {
            $('#text-address').text('Anda telah mencapai batas maksimum karakter');
        } else {
            var char = max - len;
            $('#text-address').text(char + ' karakter tersisa');
        }
    });
</script>


<?php

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $DTO = $_POST['DTO'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if ($gender == 'm') {
        $jk = 'male';
    } elseif ($gender == 'f') {
        $jk = 'female';
    }

    if ($id == "" || $name == "" || $DTO == "" || $phone_number == "" || $address == "") {
?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data masih ada yang kosong!'
            });
        </script>
        <?php
    } else {

        // insert user
        $qUser = "INSERT INTO tbl_user(username, password, Name, Photo, role) VALUES('$id', '$id', NULL, NULL, 'student')";
        $User = mysqli_query($koneksi, $qUser);


        if ($User) {

            // insert Teacher
            $q = "INSERT INTO tbl_teacher(TeacherID, Username, Name, Address, Gender, DateOfBirth, PhoneNumber) VALUES('$id', '$id', '$name', '$address', '$jk', '$DTO', '$phone_number')";
            $Teacher = mysqli_query($koneksi, $q);

            if ($Teacher) {
        ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Input?',
                        text: 'Lanjut Input Data?',
                        showDenyButton: true,
                        confirmButtonText: 'Ya, Lanjut Input!',
                        denyButtonText: `Tidak, Kembali Ke Manage`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload();
                        } else if (result.isDenied) {
                            location.href = '?menu=manage_teacher';
                        }
                    });
                </script>

            <?php
            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada yang Error nich'
                    });
                </script>
            <?php
            }

            // 

        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ada yang Error nich'
                });
            </script>
<?php
        }
    }
}

?>