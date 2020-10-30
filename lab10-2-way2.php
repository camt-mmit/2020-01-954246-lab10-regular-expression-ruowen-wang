<?php
/*
*** 602110190 ruowen wang
    wecaht:602110190 ruowen wang
*/
//it's my second way by using array, but can't recongnize  text with numbers( INX246 ) .
    $file = fopen($_SERVER['argv'][1], 'r');
    $row=array();
    $i=0;
    while(! feof($file))
    {
     $row[$i]= fgets($file);
     $i++;
    }
    fclose($file);//按照行读进数组
  
    foreach ($row as $str) {//遍历每一行，一共3行
      if(empty($str)){return '';}
      $temp=array('1','2','3','4','5','6','7','8','9','0','.');//要匹配的内容
      $mumList = array();
      $result='';

      for($i=0;$i<strlen($str);$i++){
          if(in_array($str[$i],$temp)){//检测元素是不是在数字数组里，如果不在数组里就写""，在数组里就接着往下
             if(is_numeric($str[$i]) ){//是数字类型就写进结果数组里
                 $result.=$str[$i];
             }
             if($str[$i]=='.' && is_numeric($str[$i-1])&&is_numeric($str[$i-1]) && (isset($str[$i+1]) && is_numeric($str[$i+1]))){
                 $result.=$str[$i];//看是小数点就写进数组里
             }
              if(($i+1)==strlen($str)) {
                 $mumList[] = $result;
                 $result = '';
              }
            
          }else{
             $mumList[] = $result;//写进数组的是上次i循环的数字
             $result = '';//写进去时候result又变什么什么都没有
          }
      }
    
      $mumList = array_values(array_filter($mumList));//有的value是空的，所以把非空的数组元素挑出来
     echo implode("\n", $mumList);//数组和字符串结合一起
     echo "\n";
}
   