<?php

require_once "../libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];

    $delete = delete('hasil', [
        'IDHasil' => $id
    ]);
    if ( $delete > 0 ) {
        header('location: ../?page=data_hasil');
    } else {
        die('Terjadi kesalahan!');
    }
}
