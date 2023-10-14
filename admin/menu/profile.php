<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<div class="row">
    <div class="col-lg-5 mb-4">
        <div class="card">
            <div class="card-header">
                Foto Profile
            </div>
            <div class="card-body">
                <img src="../uploads/<?= $profile['Photo']; ?>" alt="Asep Saepudin" class="img-thumbnail mb-4">
                <form action="" role="form">
                    <div class="form-group">
                        <input type="file" class="form-control p-1" id="fileInput">
                    </div>
                </form>
                <button type="submit" class="btn btn-primary w-100">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    Save
                </button>
            </div>
        </div>
    </div>


    <div class="col-lg-7">
        <div class="card mb-4">
            <div class="card-header">
                Edit Profile
            </div>
            <div class="card-body">
                <!-- edit profile -->
                <form action="" class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" value="<?= $profile['username']; ?>" disabled>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="<?= $profile['Name']; ?>" readonly>
                    </div>
                </form>
                <!-- <button type="submit" class="btn btn-primary w-100">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    Save
                </button> -->
                <!-- end of edit profile -->
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Edit Password
            </div>
            <div class="card-body">
                <!-- edit password -->
                <form action="" class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <label for="pass_old" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="pass_old">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="pass_new" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="pass_new">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pass_confirm">
                    </div>
                </form>
                <button type="submit" class="btn btn-primary w-100">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    Save
                </button>
                <!-- end of edit password -->
            </div>
        </div>
    </div>
</div>