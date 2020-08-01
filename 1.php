<?php

function pascal_function($number)
{
    $output = array(
        array(1)
    );

    //baris
    for ($i = 1; $i <= $number; $i++) {
        $array = array();

        //kolom
        for ($j = 1; $j <= $i + 1; $j++) {
            //rumus -> Un = i!/(i-(j-1)! * (j-1)!)
            $Un = gmp_fact($i) / (gmp_fact($i - ($j - 1)) * gmp_fact($j - 1));
            array_push($array, $Un);
        }
        array_push($output, $array);
    }

    return $output;
}

//test fungsi
echo "<pre>";
print_r(pascal_function(4));
echo "</pre>";
