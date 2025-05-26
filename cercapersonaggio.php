<?php
header('Content-Type: application/json');

cercaPers();

function cercaPers()
{

    $query = urlencode($_GET["q"]);
    $url='https://api.disneyapi.dev/character?name='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
}

?>