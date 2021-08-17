<?php

function toCamel($input)
{
    $output = "";
    while (strpos($input, "_")) {
        $index = strpos($input, "_");
        $output = substr_replace($input, "", $index, 1);
        $output[$index]= strtoupper($output[$index]);
        $input = $output;
    }
    return $output;
}

function covertToCamel($array)
{
    foreach ($array as $str)
    {
        $str = toCamel($str);
        echo "$str \n";
    }
}

$input = ["hi_prasanth_gud_morning", "camel_case"];
covertToCamel($input);
echo "\n";
