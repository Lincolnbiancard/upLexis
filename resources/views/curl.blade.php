<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.uplexis.com.br/blog/compliance-na-logistica/');



curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HEADER, 0);

$output = curl_exec($ch);
dd(gettype($output));


if($output === false) {
    echo "cURL error: " .curl_error($ch);
}

curl_close($ch);

print_r($output);