<?php

require_once './config.php';

$kode_baru = getNewPrimaryKey('NoPeserta', 'peserta');

if ( isset($_POST['submit']) ) {

    $insert = insert('peserta', [
        'NoPeserta' => $_POST['no_peserta'],
        'Nama'      => $_POST['nama'],
        'Alamat'    => $_POST['alamat'],
        'Email'     => $_POST['email'],
        'Telp'      => $_POST['telp']
    ]);

    if ( $insert > 0 ) {
        header('location: ?page=data_peserta');
    } else {
        die('Terjadi kesalahan!');
    }
}

?>