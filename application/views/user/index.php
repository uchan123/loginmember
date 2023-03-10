<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
<<<<<<< HEAD
    <?php
    if ($user['sex'] == 'l') {
        $gender = 'Male';
    } elseif ($user['sex'] == 'p') {
        $gender = 'Female';
    } else {
        $gender = '';
    }
    ?>
    <div class="card bg-light mb-3 col-lg-8">
=======

    <div class="card bg-light mb-3 col-lg-8" >
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><?= $user['ktp']; ?></p>
<<<<<<< HEAD
                    <p class="card-text"><?= $gender; ?></p>
                    <p class="card-text"><?= date_format(date_create($user['tgl_lhr']), "d F Y"); ?></p>
=======
                    <p class="card-text"><?= $user['sex']; ?></p>
                    <p class="card-text"><?= $user['tgl_lhr']; ?></p>
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
                    <p class="card-text"><?= $user['telp']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?> </small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
<<<<<<< HEAD
        <div class="col">
            <hr>
            <h1 class="h3 mb-4 text-gray-800">Data JSON</h1>
            <?php
            //echo "<pre>"; print_r($user); 
            //echo "<br/>";
            echo "<pre>" . json_encode($user, JSON_PRETTY_PRINT) . "</pre>";
            ?>

        </div>
=======
<div class="col">
    <hr>
<h1 class="h3 mb-4 text-gray-800">Data JSON</h1>
<?php 
//echo "<pre>"; print_r($user); 
//echo "<br/>";
echo "<pre>".json_encode($user, JSON_PRETTY_PRINT)."</pre>";
?>
 
</div>
>>>>>>> 6c83ecd2b68aecc718e03aa6697a299bbf9aa1d3
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->