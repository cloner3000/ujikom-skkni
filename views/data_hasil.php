<?php
require_once "template/header.php";
require_once "libraries/database.php";
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Hasil</h1>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col-md-2">
                        <a href="?page=form_tambah_hasil" class="btn btn-primary">Tambah</a>
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
                                <th>ID Skema</th>
                                <th>No. Skema</th>
                                <th>No. Peserta</th>
                                <th>Nilai P</th>
                                <th>Nilai I</th>
                                <th>Nilai T</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ( isset($_POST['cari']) ) {
                                    $keyword = $_POST['keyword'];
                                    $hasils = getAllLike('hasil', $keyword);
                                } else {
                                    $hasils = getAll('hasil');
                                }
                               
                                foreach($hasils as $hasil){
                            ?>
                            <tr>
                                <td><?= $hasil['IDHasil']; ?></td>
                                <td><?= $hasil['NoSkema']; ?></td>
                                <td><?= $hasil['NoPeserta']; ?></td>
                                <td><?= $hasil['NilaiP']; ?></td>
                                <td><?= $hasil['NilaiI']; ?></td>
                                <td><?= $hasil['NilaiT']; ?></td>
                                <td style="min-width: 150px;">
                                    <a href="?page=form_edit_hasil&id=<?= $hasil['IDHasil']; ?>" class="btn btn-success"> Edit </a>
                                    <a href="./controller/hapus_hasil.php?id=<?= $hasil['IDHasil']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo "<p><strong>".count($hasils)."</strong> data ditemukan </p>"; ?>
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