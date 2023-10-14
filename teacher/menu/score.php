<div class="card shadow mb-4">
    <div class="card-header">
        <div class="card-title mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Input Score</h1>
        </div>
        <form action="">
            <div class="row justify-content-center">
                <label for="subject" class="col-sm-2 col-form-label text-center">Subject</label>
                <div class="col-sm-3">
                    <select class="form-control" id="subject">
                        <option selected>-- Choose Class --</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <label for="class_name" class="col-sm-2 col-form-label text-center">Class Name</label>
                <div class="col-sm-3">
                    <select class="form-control" id="class_name">
                        <option selected>-- Choose Class --</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <p class="text-center">Assigment : 20%. Mid Exam : 30%. Final Exam : 50%.</p>
        <div class="table-responsive mb-4">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Assigment</th>
                        <th>MidExam</th>
                        <th>FinalExam</th>
                        <th>Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <tr class='clickable-row' data-href=''>
                            <td><?= $i + 1; ?></td>
                            <td>Asep Saepudin</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
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

<div class="row justify-content-center mb-4" style="height: 100px;">
    <div class="col-md-4 mb-2 text-center">
        <button type="submit" class="btn btn-secondary" id="entry" data-toggle="modal" data-target="#entryModal">
            <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span>
            Entry Score
        </button>
    </div>
</div>



<!-- Entry Modal-->
<div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Entry Score</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <p class="text-center">
                        <label for="id">[Student ID]</label> -
                        <label for="name">[Name]</label>
                    </p>
                    <div class="row justify-content-center mb-2">
                        <label for="assigment" class="col-md-4 col-form-label">Assigment</label>
                        <input type="number" class="col-md-5 form-control" id="assigment">
                    </div>
                    <div class="row justify-content-center mb-2">
                        <label for="mid" class="col-md-4 col-form-label">Mid Exam</label>
                        <input type="number" class="col-md-5 form-control" id="mid">
                    </div>
                    <div class="row justify-content-center mb-2">
                        <label for="final" class="col-md-4 col-form-label">Final Exam</label>
                        <input type="number" class="col-md-5 form-control" id="final">
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button class="btn btn-primary" type="submit" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>