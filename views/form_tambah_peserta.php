<?php
require_once "template/header.php";
require_once "libraries/database.php";
require_once "./controller/tambah_peserta.php";    
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Tambah Peserta</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Form Tambah Peserta</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>No Peserta</label>
                                        <input type="number" class="form-control" name="no_peserta" placeholder="No Peserta" value="<?= $kode_baru; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp</label>
                                        <input type="number" class="form-control" name="telp" placeholder="No. Telp">
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

<?php require_once "template/footer.php"; ?>