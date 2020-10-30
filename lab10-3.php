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
    $pattern = '/^[A-Z]+$/';//+ 匹配前面的子表达式一次或多次。
$result = [];
foreach ($row as $value) { //遍历行
    $arr = explode(' ', $value); //根据空格分割单词，每一行变成了一个数组arr，每个单词是数组中的元素
    foreach ($arr as $v) {//遍历一行中的每个单词
        $v = str_replace('(', '', $v);
        $v = str_replace(')', '', $v);
        $v = str_replace('.', '', $v);//把括号局点删掉
        if (preg_match_all($pattern,$v,$match)) { //符合条件的写入math数组
            if (!in_array(implode($match[0]), $result)) {
                $result[] = implode($match[0]);
            }
        }   
    }

}
echo implode("\n", $result);