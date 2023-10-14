<?php

$qjumlah = mysqli_query($koneksi, "SELECT * FROM tbl_teacher");
$jumlah = mysqli_num_rows($qjumlah);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Schedule</h1>
</div>

<a href="?menu=add_schedule" class="btn btn-sm btn-primary mb-2">
    <span class="icon text-white-50">
        <i class="fas fa-plus-circle"></i>
    </span>
    Add Data
</a>
<a href="?menu=edit_schedule" class="btn btn-sm btn-secondary mb-2">
    <span class="icon text-white-50">
        <i class="fas fa-sync"></i>
    </span>
    Refresh
</a>

<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="">
                    <div class="row mb-3">
                        <label for="class_name" class="col-sm-4 col-form-label">Class Name</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="class_name">
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
                </form>
            </div>

            <div class="col-md-5">
                <form action="">
                    <div class="row mb-3">
                        <label for="class_name" class="col-sm-4 col-form-label text-right">Day</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="class_name">
                                <option selected>-- Choose Day --</option>
                                <option value="1">Monday</option>
                                <option value="2">Thuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Teacher Name</th>
                        <th>Shift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <tr class='clickable-row' data-href=''>
                            <td><?= $i + 1; ?></td>
                            <td>Agama</td>
                            <td class="text-nowrap">Asep Saepudin</td>
                            <td class="text-nowrap">1</td>
                            <td>
                                <a href="?menu=edit_teacher&teacherId=<?= $data['TeacherID']; ?>" class="btn btn-sm btn-success">
                                    <span class="icon text-white-75">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger delete" id="delete" data-id="<?= $data['TeacherID']; ?>">
                                    <span class="icon text-white-75">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <!-- end of pagination -->
    </div>
</div>