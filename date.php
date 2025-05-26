<?php
header('Content-Type: application/json');

dateChiusura();

function dateChiusura()
{

    $numero = $_GET["q"];
    $url='https://date.nager.at/api/v3/PublicHolidays/'.$numero.'/IT';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
}

?>
