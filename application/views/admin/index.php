<!-- Begin Page Content -->
<div class="container-fluid">
<<<<<<< HEAD
  <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= $this->session->flashdata('message'); ?>


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">

    <div class="col-sm">
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add New</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Telp</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">No. ID</th>
            <th scope="col">Image</th>
            <th scope="col">Role</th>
            <th scope="col">Date Created</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($users as $x) : ?>
            <?php
            if ($x['sex'] == 'l') {
              $gender = 'Male';
            } elseif ($x['sex'] == 'p') {
              $gender = 'Female';
            } else {
              $gender = '';
            }
            if ($x['role_id'] == '1') {
              $role = 'Administrator';
            } elseif ($x['role_id'] == '2') {
              $role = 'User';
            } else {
              $role = '';
            }
            ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $x['name']; ?></td>
              <td><?= $x['email']; ?></td>
              <td><?= $gender; ?></td>
              <td><?= $x['telp']; ?></td>
              <td><?= date_format(date_create($x['tgl_lhr']), "d F Y"); ?></td>
              <td><?= $x['ktp']; ?></td>
              <td><?= $x['image']; ?></td>
              <td><?= $role; ?></td>
              <td><?= date('d F Y', $x['date_created']); ?></td>
              <td><a href="<?= base_url(); ?>admin/edit/<?= $x['id']; ?>" class="badge badge-success">edit</a>
                <a href="<?= base_url(); ?>admin/delete/<?= $x['id']; ?>" class="badge badge-danger" onclick="return confirm('are you sure you want to delete?');"> delete </a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
=======
<?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= $this->session->flashdata('message'); ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <div class="col-sm">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add New</a>
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Telp</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">No. ID</th>
      <th scope="col">Image</th>
      <th scope="col">Role</th>
      <th scope="col">Date Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($users as $x) : ?>
     <?php   if($x['sex'] == 'l'){
            $gender = 'Male';
        }elseif($x['sex'] == 'p'){
            $gender = 'Female';
        }else{
            $gender = '';
        }
        if($x['role_id'] == '1'){
            $role = 'Administrator';
        }elseif($x['role_id'] == '2'){
            $role = 'User';
        }else{
            $role = '';
        }
       ?> 
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $x['name']; ?></td>
      <td><?= $x['email']; ?></td>
      <td><?= $gender; ?></td>
      <td><?= $x['telp']; ?></td>
      <td><?= date_format(date_create($x['tgl_lhr']),"d F Y"); ?></td>
      <td><?= $x['ktp']; ?></td>
      <td><?= $x['image']; ?></td>
      <td><?= $role; ?></td>
      <td><?= date('d F Y', $x['date_created']); ?></td>
      <td><a href="<?= base_url(); ?>admin/edit/<?=$x['id']; ?>" class="badge badge-success">edit</a>
    <a href ="<?= base_url(); ?>admin/delete/<?=$x['id']; ?>" class="badge badge-danger" onclick="return confirm('are you sure you want to delete?');"> delete </a>
</td>
    </tr>
     <?php $i++; ?>
     <?php endforeach; ?>
  </tbody>
</table>
        </div>
    </div>
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3

</div>
</div>
<!-- End of Main Content -->

<<<<<<< HEAD
<!-- Modal Add New -->
=======
<!-- Modal -->
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<<<<<<< HEAD
      <?= form_open_multipart('admin'); ?>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Input No. ID">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Input Full Name">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Input Email Address">
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="telp" placeholder="Input No. HP" name="telp">
        </div>
        <div class="form-group">
          <select name="gender" id="gender" class="form-control">
            <option value="l">Male</option>
            <option value="p">Female</option>
          </select>
        </div>
        <div class="form-group">
          <?php $attributes = 'id="dob" placeholder="Date of Birth" name="dob" class="form-control"';
          echo form_input('dob', set_value('dob'), $attributes); ?>
        </div>
        <div class="form-group">
          <div class="sm-3">
            <img src="<?= base_url('assets/img/profile/default.png'); ?>" class="img-thumbnail" width="300" height="400">
          </div>
          <div class="sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div>
=======
      <form action="<?= base_url('admin'); ?>" method="post">
      <div class="modal-body">
      <div class="form-group">
      <input type="text" class="form-control" id="name"  name="name" placeholder="Input Full Name">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="Input Email Address">
    </div>
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
    </div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="telp" placeholder="Input No. HP">
    </div>
    <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Male</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Female</label>
</div>
     <div class="form-group">
      <input type="text" class="form-control" id="tgllhr" placeholder="Tanggal Lahir">
    </div>
     <div class="form-group">
      <input type="text" class="form-control" id="gambar" placeholder="Input Gambar">
    </div>
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
<<<<<<< HEAD
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('admin/edit'); ?>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Input No. ID" value="<?= $usere['ktp']; ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Input Full Name" value="<?= $usere['name']; ?>">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
=======
    </form>
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
    </div>
  </div>
</div>