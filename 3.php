<?php
//remove filename from array
unset($argv[0]);
$argv = explode(" ", $argv[1]);

//delete repeated elements
$argv = array_unique($argv);

//sorting elements in increasing
asort($argv);

foreach ($argv as $key=>$value){
    //if length of natural representation doesn't match with length of string representation we'll remove this elem from array
    if(strlen($value) != strlen(intval($value))) 
        unset($argv[$key]);
    else
        echo $value.' ';
}
