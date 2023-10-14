<div class="card shadow mb-4">
    <div class="card-header">
        <div class="card-title mb-2">
            <h1 class="h3 mb-0 text-gray-800 text-center">View Score</h1>
        </div>

        <div class="card-body">
            <p class="text-center">Assigment : 20%. Mid Exam : 30%. Final Exam : 50%.</p>
            <div class="table-responsive mb-4">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Subject Name</th>
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
                                <td>Agama</td>
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