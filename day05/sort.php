<?php


// $data = array('a' => 50, 'b' => 3, 'c' => 20, 'd' => 14);
// print_r($data);
//
// echo "\n\n";
//
// rsort($data, SORT_NUMERIC);
// print_r($data);

$parcentage = array();
$parcentage[] = 23.4;
$parcentage[] = 34.4;
$parcentage[] = 12.5;
$parcentage[] = 11.1;

$data = array();
$data['a'] = $parcentage[0];
$data['b'] = $parcentage[1];
$data['c'] = $parcentage[2];
$data['d'] = $parcentage[3];

rsort($data, SORT_NUMERIC);

print_r($data);
