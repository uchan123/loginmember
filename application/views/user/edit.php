<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit');
            //echo form_open_multipart('user/edit');
            ?>
            <!-- <form action="<?= base_url('user/edit'); ?>" method="post"> -->

            <div class="from-group row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="from-group row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?> ">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="from-group row mb-3">
                <label for="ktp" class="col-sm-2 col-form-label">No. ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ktp" name="ktp" value="<?= $user['ktp']; ?>">
                </div>
            </div>
            <div class="from-group row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-control">
                        <option value="l" <?php echo $user['sex'] == 'l' ? 'selected' : '' ?>> Male </option>
                        <option value="p" <?php echo $user['sex'] == 'p' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="from-group row mb-3">
                <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dob" name="dob" value="<?= $user['tgl_lhr']; ?>">
                </div>
            </div>
            <div class="from-group row mb-3">
                <label for="telp" class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?> ">
                </div>
            </div>
            <div class="from-group row mb-3">
                <div class="col-sm-2"> Picture </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="300" height="400">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

            </form>
        </div>

    </div>

    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->