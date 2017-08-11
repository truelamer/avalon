<?php
/**
 * Created by PhpStorm.
 * User: Ilya.F
 * Date: 10.08.2017
 * Time: 11:51
 */
$time = array();
$fd = fopen("time.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = fgets($fd);
    $str = explode(" ", $str);
    foreach ($str as $ttt)
    {
        array_push($time, strtotime($ttt));
    }
    rsort($time);
    foreach ($time as $ttt)
    {
        echo date("H:i:s", $ttt)." ";
    }
    echo "<br>";
    $time = array();
}
fclose($fd);