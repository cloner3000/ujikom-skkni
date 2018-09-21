<?php
require_once "template/header.php";
require_once "libraries/database.php";
require_once "./controller/edit_hasil.php";
$skemas = getPKAndNama('skema');    
$pesertas = getPKAndNama('peserta');    
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
                                    <select name="no_skema" class="form-control">
                                        <?php foreach($skemas as $skema){ ?>
                                            <option value="<?= $skema['NoSkema']; ?>" <?php if ($hasil['NoSkema'] == $skema['NoSkema']) { echo 'selected'; } ?> ><?= $skema['NoSkema']." - ".$skema['NamaSkema'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Peserta</label>
                                    <select name="no_peserta"class="form-control">
                                        <?php foreach($pesertas as $peserta){ ?>
                                            <option value="<?= $peserta['NoPeserta']; ?>" <?php if ($hasil['NoPeserta'] == $peserta['NoPeserta']) { echo 'selected'; } ?> ><?= $peserta['NoPeserta']." - ".$peserta['Nama'] ?></option>
                                        <?php } ?>
                                    </select>
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