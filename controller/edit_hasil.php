<?php

require_once './config.php';

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];
    
    $data_hasil = getById('hasil', [
        'IDHasil' => $id
    ]);
}

if ( isset($_POST['submit']) ) {

    $update = update('hasil', [
        'IDHasil'   => $_POST['id_hasil'],
        'NoSkema'   => $_POST['no_skema'],
        'NoPeserta' => $_POST['no_peserta'],
        'NilaiP'    => $_POST['nilai_p'],
        'NilaiI'    => $_POST['nilai_i'],
        'NilaiT'    => $_POST['nilai_t']
    ], [
        'IDHasil'   => $_POST['id_hasil']
    ]);

    if ( $update > 0 ) {
        header('location: ?page=data_hasil');
    } else {
        die('Terjadi kesalahan!');
    }
}