<?php
require_once "./controller/tambah_hasil.php";
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Tambah Skema</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Form Tambah Skema</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <label>ID Hasil</label>
                                    <input type="number" class="form-control" name="id_hasil" placeholder="ID Hasil" value="<?= $kode_baru; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>No Skema</label>
                                    <select name="no_skema" class="form-control">
                                        <?php foreach($data_skema as $skema):?>
                                            <option value="<?= $skema['NoSkema']; ?>">  <?= $skema['NoSkema']." - ".$skema['NamaSkema']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Peserta</label>
                                    <select name="no_peserta" class="form-control">
                                        <?php foreach($data_peserta as $peserta):?>
                                            <option value="<?= $peserta['NoPeserta']; ?>">  <?= $peserta['NoPeserta']." - ".$peserta['Nama']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Praktek</label>
                                    <input type="number" class="form-control" name="nilai_p" placeholder="Nilai Praktek">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Interview</label>
                                    <input type="number" class="form-control" name="nilai_i" placeholder="Nilai Interview">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Tambahan</label>
                                    <input type="number" class="form-control" name="nilai_t" placeholder="Nilai Tambahan">
                                </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="reset">Hapus</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                    </div>
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