<?php

function hitungVoucher($voucher, $price)
{
    $price_after_disc = $price;
    $disc = 0;

    //cek nama voucher
    if ($voucher == "DumbWaysJos") {
        //cek minimal harga
        if ($price >= 50000) {
            $disc = 0.211 * $price;

            //cek limit diskon
            if ($disc <= 20000) {
                $price_after_disc = $price - $disc;
            } else {
                $disc = 20000;
                $price_after_disc = $price - $disc;
            }
        }
    } else if ($voucher == "DumbWaysMantap") {
        //cek minimal harga
        if ($price >= 80000) {
            $disc = 0.3 * $price;

            //cek limit diskon
            if ($disc <= 40000) {
                $price_after_disc = $price - $disc;
            } else {
                $disc = 40000;
                $price_after_disc = $price - $disc;
            }
        }
    }

    $change = $price - $price_after_disc;
    $result = array(
        "bayar" => $price_after_disc,
        "diskon" => $disc,
        "kembali" => $change
    );

    return $result;
}

//test fungsi
echo "<pre>";
print_r(hitungVoucher("DumbWaysJos", 86000));
echo "</pre>";
