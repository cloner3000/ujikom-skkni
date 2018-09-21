<?php
require_once "template/header.php";
require_once "libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];
    
    $data_hasil = getById('hasil', [
        'IDHasil' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('hasil', [
        'IDHasil'   => $_POST['id_hasil'],
        'NoSkema'   => $_POST['no_skema'],
        'NoPeserta' => $_POST['no_peserta'],
        'NilaiP'    => $_POST['nilai_p'],
        'NilaiI'    => $_POST['nilai_i'],
        'NilaiT'    => $_POST['nilai_t']
    ], [
        'IDHasil'   => $_POST['id_hasil']
    ]);

    if ( $update > 0 ) {
        header('location: data_hasil.php');
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
                <h1 class="page-header">Form Edit Hasil</h1>
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Form Edit Hasil</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="POST" role="form">
                            <?php foreach($data_hasil as $hasil){ ?>
                                <div class="form-group">
                                    <label>ID Hasil</label>
                                    <input type="number" class="form-control" name="id_hasil" placeholder="ID Hasil" value="<?= $hasil['IDHasil']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>No Skema</label>
                                    <input type="number" class="form-control" name="no_skema" placeholder="No Skema" value="<?= $hasil['NoSkema']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>No Peserta</label>
                                    <input type="number" class="form-control" name="no_peserta" placeholder="No Peserta" value="<?= $hasil['NoPeserta']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Praktek</label>
                                    <input type="number" class="form-control" name="nilai_p" placeholder="Nilai Praktek" value="<?= $hasil['NilaiP']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Interview</label>
                                    <input type="number" class="form-control" name="nilai_i" placeholder="Nilai Interview" value="<?= $hasil['NilaiI']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Tambahan</label>
                                    <input type="number" class="form-control" name="nilai_t" placeholder="Nilai Tambahan" value="<?= $hasil['NilaiT']; ?>">
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