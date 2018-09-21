<?php
require_once "template/header.php";
require_once "libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];
    
    $data_skema = getById('skema', [
        'NoSkema' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('skema', [
        'NoSkema'   => $_POST['no_skema'],
        'NamaSkema' => $_POST['nama_skema'],
        'Ruang'     => $_POST['ruang']
    ], [
        'NoSkema'   => $_POST['no_skema']
    ]);

    if ( $update > 0 ) {
        header('location: data_skema.php');
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
                <h1 class="page-header">Form Edit Skema</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Form Edit Skema</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="" method="POST" role="form">
                                <?php foreach($data_skema as $skema){ ?>
                                    <div class="form-group">
                                        <label>No Skema</label>
                                        <input type="number" class="form-control" name="no_skema" placeholder="No Skema" value="<?= $skema['NoSkema']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="text" class="form-control" name="nama_skema" placeholder="Nama Skema" value="<?= $skema['NamaSkema']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Ruang</label>
                                        <input type="text" class="form-control" name="ruang" placeholder="Ruang" value="<?= $skema['Ruang']; ?>">
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