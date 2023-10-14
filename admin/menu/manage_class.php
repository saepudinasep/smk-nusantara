<?php

$qClass = mysqli_query($koneksi, "SELECT * FROM tbl_class");
// $Class = mysqli_fetch_array($qClass);

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Class</h1>
</div>


<div class="card">
    <div class="card-header">
        <form action="">
            <div class="row mb-3">
                <label for="class_name" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <select id="cmbCategory" class="custom-select">
                            <option value="">-- Choose Class --</option>
                            <?php
                            $query = "SELECT * FROM tbl_class";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["ClassName"] . "'>" . $row["ClassName"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body row">
        <div class="col-md-5 mb-4">
            <h1 class="h5 mb-0 text-gray-800 mb-4">Student List</h1>
            <div class="table-responsive mb-4" style="max-height: 500px;">
                <table class="table table-bordered text-center" width="100%" cellspacing="0" id="tbl1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qStudent = mysqli_query($koneksi, "SELECT * FROM tbl_student WHERE tbl_student.StudentID NOT IN (SELECT StudentID FROM tbl_detailclass)");

                        $no = 1;
                        while ($data = mysqli_fetch_array($qStudent)) {
                        ?>
                            <tr style="cursor:pointer;">
                                <td><?= $no++; ?></td>
                                <td><?= $data['StudentID']; ?></td>
                                <td><?= $data['Name']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-2 mb-4 text-center" style="padding-top: 200px;">
            <input type="text" id="class" hidden>
            <input type="text" id="studentId" hidden>
            <button type="submit" class="btn btn-light w-50 border-dark mb-4" id="insert" data-toggle="modal" data-target="#insertModal" disabled>
                <span class="icon text-dark-50">
                    <i class="fas fa-angle-double-right"></i>
                </span>
            </button>
            <button type="submit" class="btn btn-light w-50 border-dark mb-4" id="delete" data-toggle="modal" data-target="#deleteModal" disabled>
                <span class="icon text-dark-50">
                    <i class="fas fa-angle-double-left"></i>
                </span>
            </button>
        </div>

        <div class="col-md-5 mb-4">
            <h1 class="h5 mb-0 text-gray-800 mb-4">Participate Student</h1>
            <div class="table-responsive mb-4" style="max-height: 500px;">
                <table class="table table-bordered text-center" width="100%" cellspacing="0" id="tbl2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody id="tableData">
                        <!-- Data akan ditampilkan disini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        // Fungsi untuk mengatur status tombol
        function setButtonStatus(insertStatus, deleteStatus) {
            $("#insert").prop("disabled", insertStatus);
            $("#delete").prop("disabled", deleteStatus);
        }

        $("#tableData").click(function() {
            // id = $(this).find("td:eq(1)").text();
            // $("#studentId").val(id);

            // Mengatur status tombol
            setButtonStatus(true, false);
        });

        $("#cmbCategory").change(function() {
            var category = $(this).val();
            $("#class").val(category);
            $.ajax({
                type: "POST",
                url: "ajax/fetch_data.php",
                data: {
                    cmbCategory: category
                },
                success: function(data) {
                    $("#tableData").html(data);
                }
            });
        });

        $("#insert").click(function() {
            var studentId = $("#studentId").val();
            var kelas = $("#class").val();

            if (!kelas) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Harap pilih Class sebelum menambahkan data.',
                });
            } else {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah Anda yakin ingin menambahkan ' + studentId + '  ke dalam Class ' + kelas + '?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "ajax/ClassStudent.php",
                            type: "POST",
                            data: {
                                studentId: studentId,
                                kelas: kelas
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data berhasil ditambahkan',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        });
                    }
                });
            }


        });

        var id;

        $("#tbl1 tr").click(function() {
            id = $(this).find("td:eq(1)").text();
            $("#studentId").val(id);

            // Mengatur status tombol
            setButtonStatus(false, true);
        });

        $("#delete").click(function() {
            var studentId = $("#studentId").val();
            var kelas = $("#class").val();

            if (!kelas) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Harap pilih kelas sebelum menghapus data.',
                });
            } else {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah Anda yakin ingin menghapus ' + studentId + ' dari kelas ' + kelas + '?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "ajax/DeleteStudent.php",
                            type: "POST",
                            data: {
                                studentId: studentId,
                                kelas: kelas
                            },
                            success: function(data) {
                                // alert("Data berhasil diDelete");
                                // location.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data berhasil diDelete',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        });
                    }
                });
            }




        });

    });
</script>