<?php
require_once "template/header.php";
require_once "libraries/database.php";
require_once "libraries/modules.php";
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Report</h1>
                    <div class="row" style="margin-bottom: 1em;">
                        <div class="col-md-12">
                            <form class="form-inline" method="POST">
                                <div class="form-group">
                                    <select name="sortir_skema" class="form-control">
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                    <button type="submit" class="btn btn-info" name="cari">Cari</button>
                                </div>
                            </form>
                        </div>          
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">No. Peserta</th>
                                <th rowspan="2">Nama Peserta</th>
                                <th rowspan="2">Jenis Skema</th>
                                <th rowspan="2">Ruang</th>
                                <th colspan="3">Nilai</th>
                                <th rowspan="2">Hasil</th>
                                <th rowspan="2">Keterangan</th>
                            </tr>
                            <tr>
                                <th>P</th>
                                <th>I</th>
                                <th>T</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ( isset($_POST['cari']) ) {
                                $keyword = $_POST['keyword'];
                                $masters = getAllLike('master', $keyword);
                            } else {
                                $masters = getAllMaster();
                            }
                                foreach($masters as $master){
                            ?>
                            <tr>
                                <td><?= $master['NoPeserta']; ?></td>
                                <td><?= $master['Nama']; ?></td>
                                <td><?= $master['NamaSkema']; ?></td>
                                <td><?= $master['Ruang']; ?></td>
                                <td><?= convertToAlphabet( $master['NilaiP'] ); ?></td>
                                <td><?= convertToAlphabet( $master['NilaiI'] ); ?></td>
                                <td><?= convertToAlphabet( $master['NilaiT'] ); ?></td>
                                <td>
                                    <?php
                                        $hasil = hasilUjiKompetensi([ $master['NilaiP'], $master['NilaiI'], $master['NilaiT'] ]);
                                        echo $hasil;
                                    ?>
                                </td>
                                <td><?= convertHasilToKeterangan($hasil); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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