<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Finalize Schedule</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" class="row">
                    <label for="class" class="col-sm-4 col-form-label">Class Name</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="class">
                            <option selected>-- Choose Class --</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <a href="" class="btn btn-light border-dark">Finalize</a>
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
                        <th>Day</th>
                        <th>Shift</th>
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
                            <td class="text-nowrap">Monday</td>
                            <td class="text-nowrap">1</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <style>
            .clickable-row:hover {
                cursor: pointer;
            }
        </style>


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