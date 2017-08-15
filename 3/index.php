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
    $files = scandir($dir);

    echo '<ol>';
    foreach($files as $file)
    {
        if($file != '.' && $file != '..')
        {
            if ($ext != "")
            {
                foreach ($ext as $item)
                {
                    if (pathinfo($file, PATHINFO_EXTENSION) == $item)
                    {
                        $flag = true;
                        break;
                    }
                }
            }
            if (!$flag)
            {
                echo '<li>'.$file;
                if(is_dir($dir.'/'.$file))
                {
                    listFolderFiles($dir.'/'.$file, $ext);
                }
                echo '</li>';
            }
        }
    }
    echo '</ol>';
}


if (isset($_GET['path']) AND (isset($_GET['ext'])))
{
    if ($_GET['ext'] != "")
    {
        $ext = explode(" ", $_GET['ext']);
    }
    else
    {
        $ext = "";
    }
    listFolderFiles($_GET['path'], $ext);
}
?>
