<?php
/*
*** 602110190 ruowen wang
    wecaht:602110190 ruowen wang
*/
// professor,It's my first method. The result can be run, but I can't Delete the blank space. 
//In the "lab10-4-way2" I use other method. 
$file = fopen($_SERVER['argv'][1], 'r');
for($u=0;;$i++){//读成数组
    $p[$i]=trim(fgets($file));
    if(feof($file)){
    break;
    }}
fclose($file);
$f=implode("",$p);//数组搞成字符串
$str = str_replace(',', '.', $f); //替换,为.
$b=str_ireplace(["My","The"]," ",$str);//去掉MY和the
$a=explode(".",$b);//用.来分数组
array_pop($a);//删最后一行
$line1=$a[0];//把第一行字符串的每个单词按照空格给拆开，组成一个数组，每个单词是一个元素
$lin1=explode(" ",$line1);
$result1=preg_grep("/^[A-Z][a-z]+$/", $lin1);
foreach($result1 as $value){
    echo $value."  " ;
}
echo"\n";
//同理处理剩下两行
$line2=$a[1];
$lin2=explode(" ",$line2);
$result2=preg_grep("/^[A-Z][a-z]+$/", $lin2);
foreach($result2 as $value){
    echo $value."  " ;
}
echo"\n";
$line3=$a[2];
$lin3=explode(" ",$line3);
$result3=preg_grep("/^[A-Z][a-z]+$/", $lin3);
foreach($result3 as $value){
    echo $value."  " ;
}
echo"\n";
$line4=$a[3];
$lin4=explode(" ",$line4);
$result4=preg_grep("/^[A-Z][a-z]+$/", $lin4);
foreach($result4 as $value){
    echo $value."  " ;
}