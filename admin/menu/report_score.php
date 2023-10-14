<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Report Score</h1>
</div>


<div class="card shadow mb-4">
    <div class="card-header">
        <form action="">
            <div class="row justify-content-center">
                <label for="subject" class="col-sm-2 col-form-label">Subject Name</label>
                <div class="col-sm-4">
                    <select class="form-control" id="subject">
                        <option selected>-- Choose Subject --</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <!-- <div class="chart-bar"> -->
        <canvas id="myBarChart"></canvas>
        <!-- </div> -->
    </div>
    <div class="card-footer">
        Passed Percentage : 100%
    </div>
</div>