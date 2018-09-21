<?php

require '../config.php';

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];

    $data_peserta = getById('peserta', [
        'NoPeserta' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('peserta', [
        'NoPeserta' => $_POST['no_peserta'],
        'Nama'      => $_POST['nama'],
        'Alamat'    => $_POST['alamat'],
        'Email'     => $_POST['email'],
        'Telp'      => $_POST['telp']
    ], [
        'NoPeserta' => $_POST['no_peserta']
    ]);

    if ( $update > 0 ) {
        header('location: ?page=data_peserta');
    } else {
        die('Terjadi kesalahan!');
    }
}