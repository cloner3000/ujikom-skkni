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
    //Loop semua nilai
    foreach ($nilai as $value) {
        if ( $value >= 60 ) {
            //Simpan nilai yang kompeten kedalam array $passed
            $passed[] = $value;
        } else {
            //Simpan nilai yang tidak kompeten kedalam array $not_passed
            $not_passed[] = $value;
        }
    }

    //Hitung jumlah nilai yang kompeten dan tidak kompeten
    $total_passed = count($passed);
    $total_not_passed = count($not_passed);
    
    if ( $total_passed >= 2 && $total_not_passed <= 2 ) {
        //Jika jumlah nilai yang lulus lebih dari 2, maka return 'K'
        $hasil = 'K';
    } else {
        //Selain itu, misal: Nilai yang kompeten hanya satu. Maka return 'BK'
        $hasil = 'BK';
    }

    return $hasil;
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
 * Konversi alfabet keterangan menjadi keterangan lengkap
 *
 * @param string $hasil
 * @return string
 */
function convertHasilToKeterangan($hasil) {

    if ( $hasil == 'K' ) {
        return 'Kompeten';
    } else {
        return 'Belum Kompeten';
    }
}