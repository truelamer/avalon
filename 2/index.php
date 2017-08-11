<?php
/**
 * Created by PhpStorm.
 * User: Ilya.F
 * Date: 09.08.2017
 * Time: 9:52
 */

if (isset ($_GET['dim']))
{
    $n = $_GET['dim'];
    $tmp_arr = array();
    $final = array();
    $arr = array();

    echo "Оригинал <br>";
    for ($i = 0; $i < $n; $i++)
    {
        for ($j = 0; $j < $n; $j++)
        {
            $arr[$i][$j] = rand(0,99);
            echo $arr[$i][$j];
            echo " ";
        }
        echo "<br>";
    }

    //Перестановка строк местами
    for ($i = 0; $i < $n; $i++)
    {
        $tmp_arr[$n-1-$i] = $arr[$i];
    }
    $arr = $tmp_arr;

    //заполняем финал
    $tmp_arr = array();
    $diag_count=0;
    for ($i = $n-1; $i >= 0; $i--)
    {
        for ($j = 0; $i+$j < $n; $j++)
        {
            array_push($tmp_arr, $arr[$i+$j][$j]);

        }
        if ($i % 2 == 1)
        {
            for ($k = count($tmp_arr)-1; $k >= 0; $k--)
            {
                ($final[$diag_count][count($tmp_arr)-$k-1]= $tmp_arr[$k]);
            }
        }
        else
        {
            for ($k = 0; $k < count($tmp_arr); $k++)
            {
                ($final[$diag_count][$k]= $tmp_arr[$k]);
            }
        }
        $diag_count++;
        $tmp_arr = array();
    }
    for ($i = 1; $i < $n; $i++)
    {
        for ($j = 0; $i+$j < $n; $j++)
        {

            array_push($tmp_arr,$arr[$j][$i+$j]);
        }
        if ($i % 2 == 1)
        {
            for ($k = count($tmp_arr)-1; $k >= 0; $k--)
            {
                ($final[$diag_count][count($tmp_arr)-$k-1]= $tmp_arr[$k]);
            }
        }
        else
        {
            for ($k = 0; $k < count($tmp_arr); $k++)
            {
                ($final[$diag_count][$k]= $tmp_arr[$k]);
            }
        }
        $diag_count++;
        $tmp_arr = array();

    }

    //переводим финал в одномерный массив
    $arr_for_sort = array();
    for ($i = 0; $i < count($final); $i++)
    {
        for ($j = 0; $j < count($final[$i]); $j++)
        {
            array_push($arr_for_sort, $final[$i][$j]);
        }
    }

    //сортируем
    sort($arr_for_sort);

    //закидываем обратно в финал
    $tet = 0;
    for ($i = 0; $i < count($final); $i++)
    {
        for ($j = 0; $j < count($final[$i]); $j++)
        {
            $final[$i][$j] = array_shift($arr_for_sort);
            $tet++;
        }
    }

    //делаем правильный порядок в финале
    for ($j = 0; $j < count($final); $j++)
    {
        if ($j % 2 == 1)
        {
            $final[$j] = array_reverse($final[$j]);
        }
    }

    //закидываем из финала в матрицу
    $diag_count = 0;
    for ($i = $n-1; $i >= 0; $i--)
    {
        for ($j = 0; $i+$j < $n; $j++)
        {
            $arr[$i+$j][$j]=$final[$diag_count][$j];
        }
        $diag_count++;
    }
    for ($i = 1; $i < $n; $i++)
    {
        for ($j = 0; $i+$j < $n; $j++)
        {
            $arr[$j][$i+$j]=$final[$diag_count][$j];
        }
        $diag_count++;
    }

    //переворачиваем матрицу
    for ($i = 0; $i < $n; $i++)
    {
        $tmp_arr[$n-1-$i] = $arr[$i];
    }
    $arr = $tmp_arr;

    //выводим матрицу
    echo "<br>Отсортированная <br>";
    for ($i = 0; $i < $n; $i++)
    {
        for ($j = 0; $j < $n; $j++)
        {
            echo $arr[$i][$j];
            echo " ";
        }
        echo "<br>";
    }
    echo "<br>";
}
?>
<form action="index.php" method="get">
    <p>Размерность матрицы <input type="text" name="dim" /></p>
    <p><input type="submit" /></p>
</form>
