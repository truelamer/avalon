<?php
/**
 * Created by PhpStorm.
 * User: Ilya.F
 * Date: 09.08.2017
 * Time: 9:16
 */

error_reporting("E_ERROR");

$link = "http://avalon.ru";
$str = file_get_contents ($link);
$html = new DOMDocument;
$html -> loadHTML($str);
$elements = $html -> getElementsByTagName('a');
foreach ($elements as $element)
{
    $attr = $element -> getAttribute("href");
    if ($attr[0] == "/")
    {
        $attr = $link.$attr;
    }
    if (($attr == "#") OR ($attr == ""))
    {
        $attr = $link;
    }
    echo $attr;
    echo "<br>";
}
