<?php
require_once "template/header.php";
require_once "libraries/database.php";
require_once "libraries/modules.php";
$skemas = getPKAndNama('skema');
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Akhir</h1>
                    <div class="row" style="margin-bottom: 1em;">
                        <div class="col-md-12">
                            <form class="form-inline" method="POST">
                                <div class="form-group">
                                    <span>Filter berdasarkan: </span>
                                    <select name="nama_skema" class="form-control">
                                        <option value="">--- Jenis Skema ---</option>
                                        <?php foreach ( $skemas as $skema ) { ?>
                                            <option value="<?= $skema['NamaSkema']; ?>"><?= $skema['NamaSkema']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <select name="kompetensi" class="form-control">
                                        <option value="">--- Kompetensi ---</option>
                                        <option value="K">Kompeten</option>
                                        <option value="BK">Belum Kompeten</option>
                                    </select>
                                    <button type="submit" class="btn btn-info" name="sort">Cari</button>
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
                            if ( isset($_POST['sort']) ) {

                                if ( $_POST['kompetensi'] !== '' ) {
                                    $kompetensi = $_POST['kompetensi'];
                                    $masters = getAllMaster([
                                        'Hasil' => $kompetensi
                                    ]);    
                                } else if( $_POST['nama_skema'] !== '') {
                                    $nama_skema = $_POST['nama_skema'];
                                    $masters = getAllMaster([
                                        'NamaSkema' => $nama_skema
                                    ]);    
                                } else {
                                    $masters = getAllMaster();
                                }

                                if ( $_POST['kompetensi'] !== '' && $_POST['nama_skema'] !== '' ) {
                                    $kompetensi = $_POST['kompetensi'];
                                    $nama_skema = $_POST['nama_skema'];
                                    $masters = getAllMasterSkemaKompetensi($nama_skema, $kompetensi); 
                                }

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
                    <?php echo "<p><strong>".count($masters)."</strong> data ditemukan </p>"; ?>
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