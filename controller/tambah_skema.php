<?php

require_once './config.php';

$kode_baru = getNewPrimaryKey('NoSkema', 'skema');

if ( isset($_POST['submit']) ) {

    $insert = insert('skema', [
        'NoSkema'   => $_POST['no_skema'],
        'NamaSkema' => $_POST['nama_skema'],
        'Ruang'     => $_POST['ruang']
    ]);

    if ( $insert > 0 ) {
        header('location: ?page=data_skema');
    } else {
        die('Terjadi kesalahan!');
    }
}