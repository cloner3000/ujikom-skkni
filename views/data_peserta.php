<?php
require_once "template/header.php";
require_once "libraries/database.php";
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Peserta</h1>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col-md-2">
                        <a href="?page=form_tambah_peserta" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="col-md-10">
                        <form class="form-inline" method="POST">
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari data..">
                                <button type="submit" class="btn btn-info" name="cari">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. Peserta</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ( isset($_POST['cari']) ) {

                                    $keyword = $_POST['keyword'];
                                    $pesertas = getAllLike('peserta', $keyword);
                                    
                                } else {

                                    $pesertas = getAll('peserta');
                                }

                                foreach($pesertas as $peserta){
                            ?>
                            <tr>
                                <td><?= $peserta['NoPeserta']; ?></td>
                                <td><?= $peserta['Nama']; ?></td>
                                <td><?= $peserta['Alamat']; ?></td>
                                <td><?= $peserta['Email']; ?></td>
                                <td><?= $peserta['Telp']; ?></td>
                                <td style="min-width: 150px;">
                                    <a href="?page=form_edit_peserta&id=<?= $peserta['NoPeserta']; ?>" class="btn btn-success"> Edit </a>
                                    <a href="./controller/hapus_peserta.php?id=<?= $peserta['NoPeserta']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo "<p><strong>".count($pesertas)."</strong> data ditemukan </p>"; ?>
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