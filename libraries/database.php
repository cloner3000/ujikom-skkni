<?php

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'ujikom_skkni';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if ( mysqli_connect_errno() ) {
    die("Koneksi gagal.. \r\n" . mysqli_connect_error($conn) );
}

/**
 * getAll
 *
 * @param string $table
 * @return array $result
 */
function getAll($table) {

    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM {$table}");
    $result = [];
    while ( $row = mysqli_fetch_array($query, MYSQLI_ASSOC) ) {
        $result[] = $row;
    }
    return $result;
}

/**
 * getById
 *
 * @param string $table
 * @param array $id Array of Primary Key Field paired with the Value
 * @return array $result
 */
function getById($table, $id) {

    global $conn;

    $where = [];
    foreach ($id as $key => $value) {
        $where[] = "{$key} = $value";
    }
    $fields = implode(' ', $where);

    $query = mysqli_query($conn, "SELECT * FROM {$table} WHERE $fields");
    $result = [];
    while ( $row = mysqli_fetch_array($query, MYSQLI_ASSOC) ) {
        $result[] = $row;
    }
    return $result;
}

/**
 * getNewPrimaryKey
 *
 * @param string $field
 * @param string $table
 * @return int
 */
function getNewPrimaryKey($field, $table){

    global $conn;

    $query = mysqli_query($conn, "SELECT MAX({$field}) AS kode_baru FROM {$table}");
    $result = mysqli_fetch_assoc($query);
    if ( mysqli_num_rows($query) >= 0 ) {
        $new_number = $result['kode_baru'] + 1;
    } else {
        $new_number = 1;
    }
    return $new_number;
}

/**
 * getPKAndNama
 *
 * @param string $table
 * @return array $result
 */
function getPKAndNama($table){

    global $conn;

    switch ($table) {
        case 'skema':
                $query = mysqli_query($conn, "SELECT NoSkema, NamaSkema FROM skema");
            break;
        
        case 'peserta':
                $query = mysqli_query($conn, "SELECT NoPeserta, Nama FROM peserta");
            break;
    }

    $result = [];
    while ( $row = mysqli_fetch_array($query, MYSQLI_ASSOC) ) {
        $result[] = $row;
    }
    return $result;
}

/**
 * getAllMaster
 *
 * @return array $result
 */
function getAllMaster() {

    global $conn;

    $sql    = "SELECT peserta.NoPeserta,
                    peserta.Nama,
                    skema.NoSkema,
                    skema.NamaSkema,
                    skema.Ruang,
                    hasil.NilaiP,
                    hasil.NilaiI,
                    hasil.NilaiT
            FROM hasil
            INNER JOIN peserta ON hasil.NoPeserta = peserta.NoPeserta
            INNER JOIN skema ON hasil.NoSkema = skema.NoSkema";
    $query  = mysqli_query($conn, $sql);
    $result = [];
    while ( $row = mysqli_fetch_array($query, MYSQLI_ASSOC) ) {
        $result[] = $row;
    }
    return $result;
}

/**
 * getAllLike
 *
 * @param string $table
 * @param string $keyword
 * @return array $result
 */
function getAllLike($table, $keyword) {
    global $conn;

    switch ($table) {
        case 'peserta':
            $sql = "SELECT * FROM peserta WHERE
                    NoPeserta LIKE '%{$keyword}%' OR
                    Nama      LIKE '%{$keyword}%' OR
                    Alamat    LIKE '%{$keyword}%' OR
                    Email     LIKE '%{$keyword}%' OR
                    Telp      LIKE '%{$keyword}%'";
            break;

        case 'skema':
            $sql = "SELECT * FROM skema WHERE
                    NoSkema   LIKE '%{$keyword}%' OR
                    NamaSkema LIKE '%{$keyword}%' OR
                    Ruang     LIKE '%{$keyword}%'";
            break;

        case 'hasil':
            $sql = "SELECT * FROM hasil WHERE
                    IDHasil   LIKE '%{$keyword}%' OR
                    NoSkema   LIKE '%{$keyword}%' OR
                    NoPeserta LIKE '%{$keyword}%' OR
                    NilaiP    LIKE '%{$keyword}%' OR
                    NilaiI    LIKE '%{$keyword}%' OR
                    NilaiT    LIKE '%{$keyword}%'";
            break;
        
        case 'master':
            $sql = "SELECT
                    peserta.NoPeserta,
                    peserta.Nama,
                    skema.NoSkema,
                    skema.NamaSkema,
                    skema.Ruang,
                    hasil.NilaiP,
                    hasil.NilaiI,
                    hasil.NilaiT
                FROM hasil
                INNER JOIN peserta ON hasil.NoPeserta = peserta.NoPeserta
                INNER JOIN skema ON hasil.NoSkema = skema.NoSkema";
            break;
    }

    $query = mysqli_query($conn, $sql);
    $result = [];
    while ( $row = mysqli_fetch_array($query, MYSQLI_ASSOC) ) {
        $result[] = $row;
    }
    return $result;
}

/**
 * insert
 *
 * @param string $table
 * @param array $data
 * @return int Number of affected row(s)
 */
function insert($table, $data) {

    global $conn;

    //Separating fields and values
    $values = [];
    foreach ($data as $key => $value) {
        $values[] = "'$value' ";
    }
    $new_values = implode(' , ', $values);

    $query = mysqli_query($conn, "INSERT INTO {$table} VALUES({$new_values})");

    return mysqli_affected_rows($conn);
}

/**
 * update
 *
 * @param string $table
 * @param array $data
 * @param array $where
 * @return int Number of affected row(s)
 */
function update($table, $data, $id) {

    global $conn;

    //Separating fields and values
    $values = [];
    foreach ($data as $key => $value) {
        $values[] = "{$key} = '$value'";
    }
    $new_values = implode(' , ', $values);

    //Separating PK Column and Identifier
    $where = [];
    foreach ($id as $key => $value) {
        $where[] = "{$key} = '$value'";
    }
    $fields = implode(' ', $where);

    $query = mysqli_query($conn, "UPDATE {$table} SET {$new_values} WHERE {$fields}");

    return mysqli_affected_rows($conn);
}

/**
 * delete
 *
 * @param string $table
 * @param array $id
 * @return int Number of affected row(s)
 */
function delete($table, $id) {

    global $conn;

    //Separating PK Column and Identifier
    $where = [];
    foreach ($id as $key => $value) {
        $where[] = "{$key} = '$value'";
    }
    $fields = implode(' ', $where);

    $query = mysqli_query($conn, "DELETE FROM {$table} WHERE {$fields}");

    return mysqli_affected_rows($conn);
}