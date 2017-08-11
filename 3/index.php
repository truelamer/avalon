<form action="index.php" method="get">
    <p>Введите желаемый путь <input type="text" name="path" /></p>
    <p>Через пробел введите расширения файлов, которые нужно исключить (php txt и тд) <input type="text" name="ext" /></p>
    <p><input type="submit" /></p>
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Ilya.F
 * Date: 10.08.2017
 * Time: 10:42
 */

function listFolderFiles($dir, $ext)
{
    $flag = false;
    //echo $ext[1];
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff)
    {
        if($ff != '.' && $ff != '..')
        {
            foreach ($ext as $item)
            {
                if (pathinfo($ff, PATHINFO_EXTENSION) == $item)
                {
                    $flag = true;
                }
            }
            if (!$flag)
            {
                echo '<li>'.$ff;
                if(is_dir($dir.'/'.$ff))
                {
                    listFolderFiles($dir.'/'.$ff, $ext);
                }
                echo '</li>';
            }
        }
    }
    echo '</ol>';
}

if (isset($_GET['ext']))
{
    $ext = explode(" ", $_GET['ext']);
}
if (isset($_GET['path']))
{
    listFolderFiles($_GET['path'], $ext);
}
?>
