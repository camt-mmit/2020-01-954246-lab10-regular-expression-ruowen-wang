<?php
/*
*** 602110190 ruowen wang
    wecaht:602110190 ruowen wang
*/
    $result = 'Satisfied:'."\n";
    $ano = 'Unsatisfied:'."\n";
    // 把文件里的数据一行一行的读到数组里,因为把第一行定义为n，所以6不会写在数组里。
    $file = fopen($_SERVER['argv'][1], 'r');
    fscanf($file, "%d", $n);
    $row=array();
    $i=0;
    while(! feof($file))
    {
     $row[$i]= fgets($file);
     $i++;
    }
    fclose($file);
   
    //匹配
    foreach ($row as $value) { //遍历数组
        if (preg_match("/^(?=.*\d){2,}(?=.*[A-Z]){2,}.{8,}$/",$value) && str_replace(' ', '', $value) == $value) {
            $count = 0;
            if (strpos($value,"@")) {
                $count++;
            }
            if (strpos($value,"$")) {
                $count++;
            }
            if (strpos($value,"&")) {
                $count++;
            }         
            if ($count >= 2 || substr_count($value, "$") >= 2 || substr_count($value, "@") >= 2 || substr_count($value, "&") >= 2) {
                $result .= $value."\n";
            } else {
                $ano .= $value."\n";
            }      
        } else {
            $ano .= $value."\n";  
        }
    }
    
    echo $result."\n";
    echo $ano;

