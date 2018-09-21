<?php
require_once "template/header.php";
require_once "libraries/database.php";
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Skema</h1>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col-md-2">
                        <a href="?page=form_tambah_skema" class="btn btn-primary">Tambah</a>
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
                                <th>No. Skema</th>
                                <th>Nama Skema</th>
                                <th>Ruang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ( isset($_POST['cari']) ) {
                                    $keyword = $_POST['keyword'];
                                    $skemas = getAllLike('skema', $keyword);
                                } else {
                                    $skemas = getAll('skema');
                                }
                                
                                foreach($skemas as $skema){
                            ?>
                            <tr>
                                <td><?= $skema['NoSkema']; ?></td>
                                <td><?= $skema['NamaSkema']; ?></td>
                                <td><?= $skema['Ruang']; ?></td>
                                <td style="min-width: 150px;">
                                    <a href="?page=form_edit_skema&id=<?= $skema['NoSkema']; ?>" class="btn btn-success"> Edit </a>
                                    <a href="./controller/hapus_skema.php?id=<?= $skema['NoSkema']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo "<p><strong>".count($skemas)."</strong> data ditemukan </p>"; ?>
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