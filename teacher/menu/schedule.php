<!-- Page Heading
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Teaching Schedule</h1>
</div> -->

<!-- teaching schedule -->
<div class="card shadow mb-4">
    <div class="card-header text-center">
        <h1 class="h3 mb-0 text-gray-800">Teaching Schedule</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Class Name</th>
                        <th>Day</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <tr class='clickable-row' data-href=''>
                            <td><?= $i + 1; ?></td>
                            <td>Matematika</td>
                            <td>TI-2020-P1</td>
                            <td>Monday</td>
                            <td>07:00 - 07:45</td>
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
<!-- end of teaching schedule -->

<!-- student list -->
<div class="card shadow mb-4">
    <div class="card-header text-center">
        <h1 class="h3 mb-0 text-gray-800">Student List</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <tr class='clickable-row' data-href=''>
                            <td><?= $i + 1; ?></td>
                            <td>Asep Saepudin</td>
                            <td>Laki - Laki</td>
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
<!-- end of student list -->