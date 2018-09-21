<?php

require_once './config.php';

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];
    
    $data_skema = getById('skema', [
        'NoSkema' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('skema', [
        'NoSkema'   => $_POST['no_skema'],
        'NamaSkema' => $_POST['nama_skema'],
        'Ruang'     => $_POST['ruang']
    ], [
        'NoSkema'   => $_POST['no_skema']
    ]);

    if ( $update > 0 ) {
        header('location: ?page=data_skema');
    } else {
        die('Terjadi kesalahan!');
    }
}