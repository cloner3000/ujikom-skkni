<?php

/**
 * hasilUjiKompetensi
 * 
 * @param array $nilai
 * @return string $hasil
 */
function hasilUjiKompetensi($nilai) {

    $passed = [];
    $not_passed = [];
    foreach ($nilai as $value) {
        if ( $value >= 60 ) {
            $passed[] = $value;
        } else {
            $not_passed[] = $value;
        }
    }

    $total_passed = count($passed);
    $total_not_passed = count($not_passed);
    
    if ( $total_passed >= 2 ) {
        $hasil = 'K';
    } else {
        $hasil = 'BK';
    }

    return $hasil;
}

/**
 * sortir
 * Callback function to convert each 'nilai' to 'K' if passed
 *
 * @param [type] $value
 * @return string
 */
function sortir($value) {
    if ( $value >= 60 ) {
        return 'K';
    } else {
        return 'BK';
    }
}

/**
 * convertToAlphabet
 * Konversi nilai ke bentuk alfabet ( K / BK )
 *
 * @param int $nilai
 * @return string
 */
function convertToAlphabet($nilai) {
    
    if ( $nilai >= 60 ) {
        return 'K';
    } else {
        return 'BK';
    }

}

/**
 * convertHasilToKeterangan
 *
 * @param string $hasil
 * @return string
 */
function convertHasilToKeterangan($hasil) {

    if ( $hasil == 'K' ) {
        return 'Kompeten';
    } else {
        return 'Tidak Kompeten';
    }
}