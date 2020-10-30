<?php
//it's my first way by using  Regular Expressions, 
//But I don't know how to edit the regular expression to match both floating point and integer.
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
array_pop($row);
fclose($file);//按行读进数组row
$a=implode("",$row);//将数组元素写成字符串

$b=str_ireplace(["/",", ",". "]," ",$a);//把标点符号去掉
$c=explode(" ",$b);//把字符串写成数组
$result2=preg_grep("/^\d+$/", $c);
foreach($result2 as $value){
    echo $value."\n";
}//匹配整数
$result1 = preg_grep("/^(\d+)?\.\d+$/", $c);
foreach($result1 as $va){
echo $va."\n";
}//匹配浮点数
 