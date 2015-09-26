<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ch = curl_init();
$result=explode($_GET["data"]);
foreach ($result as $data) {
    $fields = array('q' => $data);
    $postvars = '';
    foreach ($fields as $key => $value) {
        $postvars .= $key . "=" . $value . "&";
    }
    $url = "http://olx.in/ajax/search/list/";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $response = curl_exec($ch);
    var_dump($response);
    die;
    print "curl response is:" . $response;
    curl_close($ch);
}
?>