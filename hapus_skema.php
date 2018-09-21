<?php

require_once "libraries/database.php";

if ( isset($_GET['id'] ) ) {

    $id = $_GET['id'];

    $delete = delete('skema', [
        'NoSkema' => $id
    ]);
    if ( $delete > 0 ) {
        header('location: data_skema.php');
    } else {
        die('Terjadi kesalahan!');
    }
}
