<?php

function maskNumber($input)
{
    $start = substr($input, 0,2);
    $end = substr($input,8, 2);

    return $start . "******" . $end;
}

$input = 9876543210;
$output = maskNumber($input);

echo $output;
echo "\n";