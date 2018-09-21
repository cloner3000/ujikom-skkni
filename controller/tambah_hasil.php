<?php

$kode_baru = getNewPrimaryKey('IDHasil', 'hasil');

$data_skema   = getPKAndNama('skema');
$data_peserta = getPKAndNama('peserta');

if ( isset($_POST['submit']) ) {

    $insert = insert('hasil', [
        'IDHasil'   => $_POST['id_hasil'],
        'NoSkema'   => $_POST['no_skema'],
        'NoPeserta' => $_POST['no_peserta'],
        'NilaiP'    => $_POST['nilai_p'],
        'NilaiI'    => $_POST['nilai_i'],
        'NilaiT'    => $_POST['nilai_t'],
        'Hasil'     => hasilUjiKompetensi([ $_POST['nilai_p'], $_POST['nilai_i'], $_POST['nilai_t'] ])
    ]);

    if ( $insert > 0 ) {
        header('location: ?page=data_hasil');
    } else {
        die('Terjadi kesalahan!');
    }
}