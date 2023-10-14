<?php

$pTeacher = mysqli_query($koneksi, "SELECT * FROM tbl_teacher WHERE TeacherID = '$_SESSION[id_teacher]'");
$eTeacher = mysqli_fetch_array($pTeacher);

?>

<!-- Form Student -->
<div class="card shadow mb-4 form-student">
    <div class="card-header text-center">
        <h1 class="h4 mb-0 text-gray-800">Form Student</h1>
    </div>
    <div class="card-body">
        <form method="POST" id="form_data" class="">
            <div class="row g-3">
                <div class="col-md-6 mb-4">
                    <label for="id" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="id" name="id" readonly="true" value="<?= $eTeacher['TeacherID']; ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="DTO" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="DTO" name="DTO" value="<?= $eTeacher['DateOfBirth']; ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $eTeacher['Name']; ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $eTeacher['PhoneNumber']; ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="gender" class="form-label">Gender</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="m" value="m" <?php if ($eTeacher['Gender'] == "male") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                        <label class="form-check-label" for="m">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="f" value="f" <?php if ($eTeacher['Gender'] == "female") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                        <label class="form-check-label" for="f">Female</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"><?= $eTeacher['Address']; ?></textarea>
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

        // Update teacher
        $q = "UPDATE tbl_teacher SET Name='$name', Address='$address', Gender='$jk', DateOfBirth='$DTO', PhoneNumber='$phone_number' WHERE TeacherID='$id'";
        $Teacher = mysqli_query($koneksi, $q);

        if ($Teacher) {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil Di Edit',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.href = "?menu=manage_teacher";
                    }
                })
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
    }
}

?>