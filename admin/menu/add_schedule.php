<!-- Form Teacher -->
<div class="card shadow mb-4 form-student">
    <div class="card-header text-center">
        <h1 class="h4 mb-0 text-gray-800">Form Schedule</h1>
    </div>
    <div class="card-body">
        <form method="POST" id="form_data" class="">
            <div class="row mb-3">
                <label for="class" class="col-sm-2 col-form-label">Class</label>
                <div class="col-sm-6">
                    <select class="form-control" id="class">
                        <option selected>-- Choose Day --</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-6">
                    <select class="form-control" id="subject">
                        <option value="">-- Choose Subject --</option>
                        <?php
                        $query = "SELECT * FROM tbl_subject";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["SubjectID"] . "'>" . $row["SubjectID"] . " - " . $row["Name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-light border-dark">View Subject Needed</button>
            </div>
            <div class="row mb-3">
                <label for="teacher" class="col-sm-2 col-form-label">Teacher</label>
                <div class="col-sm-6">
                    <select class="form-control" id="teacher">
                        <option value="">-- Choose Teacher --</option>
                        <?php
                        $query = "SELECT * FROM tbl_teacher";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["TeacherID"] . "'>" . $row["Name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="day" class="col-sm-2 col-form-label">Day</label>
                <div class="col-sm-6">
                    <select class="form-control" id="day">
                        <option selected>-- Choose Day --</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="shift" class="col-sm-2 col-form-label">Shift</label>
                <div class="col-sm-6">
                    <select class="form-control" id="shift">
                        <option value="">-- Choose Shift --</option>
                        <?php
                        $query = "SELECT * FROM tbl_shift";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["ShiftID"] . "'>" . $row["Time"] . "</option>";
                        }
                        ?>
                    </select>
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
                    <a href="?menu=manage_schedule" class="btn btn-danger w-50">
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