<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
<h1 class="h3 mb-0 text-gray-800 text-center">View Schedule</h1>
<!-- </div> -->

<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row justify-content-center">
            <label for="day" class="col-sm-2 col-form-label">Day</label>
            <div class="col-sm-3">
                <select class="form-control" id="day">
                    <option selected>-- Choose Day --</option>
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>
                </select>
            </div>
            <label for="class_id" class="col-md-2 col-form-label">Class Name</label>
            <label for="class_name" class="col-md-2 col-form-label">TI-2020-P1</label>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Teacher Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <tr class='clickable-row' data-href=''>
                            <td><?= $i + 1; ?></td>
                            <td>Agama</td>
                            <td>Wednesday</td>
                            <td>07:00 - 07:45</td>
                            <td class="text-nowrap">Asep Saepudin</td>
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