<?php
require_once "template/header.php";
require_once "libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];
    
    $data_peserta = getById('peserta', [
        'NoPeserta' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('peserta', [
        'NoPeserta' => $_POST['no_peserta'],
        'Nama'      => $_POST['nama'],
        'Alamat'    => $_POST['alamat'],
        'Email'     => $_POST['email'],
        'Telp'      => $_POST['telp']
    ], [
        'NoPeserta' => $_POST['no_peserta']
    ]);

    if ( $update > 0 ) {
        header('location: data_peserta.php');
    } else {
        die('Terjadi kesalahan!');
    }
}
    
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Edit Peserta</h1>
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Form Edit Peserta</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="POST" role="form">
                            <?php foreach($data_peserta as $peserta){ ?>
                                <div class="form-group">
                                    <label>No Peserta</label>
                                    <input type="number" class="form-control" name="no_peserta" placeholder="No Peserta" value="<?= $peserta['NoPeserta']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $peserta['Nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" placeholder="Alamat" class="form-control"><?= $peserta['Alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $peserta['Email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telp</label>
                                    <input type="number" class="form-control" name="telp" placeholder="No. Telp" value="<?= $peserta['Telp']; ?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" type="reset">Hapus</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            <?php } ?>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php require_once "template/footer.php"; ?>