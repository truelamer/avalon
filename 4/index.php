<?php
/**
 * Created by PhpStorm.
 * User: Ilya.F
 * Date: 10.08.2017
 * Time: 11:51
 */
$str_time = array();
$file = fopen("time.txt", 'r') or die("не удалось открыть файл");
while(!feof($file))
{
    $str = fgets($file);
    $str = explode(" ", $str);
    foreach ($str as $time)
    {
        array_push($str_time, strtotime($time));
    }
    rsort($str_time);
    foreach ($str_time as $time)
    {
        echo date("H:i:s", $time)." ";
    }
    echo "<br>";
    $str_time = array();
}
fclose($file);