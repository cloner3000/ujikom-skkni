<?php

require_once "libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];

    $delete = delete('hasil', [
        'IDHasil' => $id
    ]);
    if ( $delete > 0 ) {
        header('location: data_hasil.php');
    } else {
        die('Terjadi kesalahan!');
    }
}
