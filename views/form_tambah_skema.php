<?php
require_once "./controller/tambah_skema.php";
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
                                        <label>No Skema</label>
                                        <input type="number" class="form-control" name="no_skema" placeholder="No Skema" value="<?= $kode_baru; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="text" class="form-control" name="nama_skema" placeholder="Nama Skema">
                                    </div>
                                    <div class="form-group">
                                        <label>Ruang</label>
                                        <input type="text" class="form-control" name="ruang" placeholder="Ruang">
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