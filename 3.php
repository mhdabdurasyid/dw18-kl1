<?php

function remove_duplicate($string)
{
    $result = "";
    $char = str_split($string);     // pecah string menjadi character
    $char = array_unique($char);    // hapus duplikat dalam array
    $char = array_values($char);    // urutkan indeks array

    for ($i = 0; $i < count($char); $i++) {
        $result .= $char[$i];
    }

    return $result;
}

//test fungsi
echo remove_duplicate("alagcgcdodol");
