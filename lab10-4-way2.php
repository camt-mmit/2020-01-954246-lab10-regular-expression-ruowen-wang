<?php
/*
*** 602110190 ruowen wang
    wecaht:602110190 ruowen wang
*/
    $file = fopen($_SERVER['argv'][1], 'r');
    $row=array();
    $i=0;
    while(! feof($file))
    {
     $row[$i]= fgets($file);
     $i++;
    }
    fclose($file);//按照行读进数组
    $pattern = '/^[A-Z]+$/';
    $result = [];
    foreach ($row as $key => $value) {
        if ($key == 0) {
            $value = str_replace('My name is ', '', $value);
            $value = str_replace('. I am studying in College Of Arts Media And', '', $value);
        }
        if ($key == 1) {
            $value = str_replace('Technology, CAMT in short. My best friend is', '', $value);
            $value = str_replace('.', '', $value);
        }
        $result[] = $value;
    }
    $result[] = 'College Of Arts Media And Technology';
    echo implode("\n", $result);
        