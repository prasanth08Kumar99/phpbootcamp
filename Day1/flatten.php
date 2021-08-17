<?php
function flatten($input_arr)
{

    $output_arr = array();

    foreach ($input_arr as $arr)
    {
        if(is_array($arr)) {
            foreach ($arr as $number) {
                array_push($output_arr, $number);
            }
        } else {
            array_push($output_arr,$arr);
        }
    }

    return $output_arr;
}

$input_arr = [2, 3, [4,5], [6,7], 8];
$output_arr = flatten($input_arr);

foreach ($output_arr as $n)
    echo "$n"." ";
echo "\n";
