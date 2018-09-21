<?php

require_once "../libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];

    $delete = delete('peserta', [
        'NoPeserta' => $id
    ]);
    if ( $delete > 0 ) {
        header('location: ../?page=data_peserta');
    } else {
        die('Terjadi kesalahan!');
    }
}
