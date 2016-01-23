<?php 
  //用mysql扩展库操作mysql数据库步骤如下：
  //1 获取数据库连接
  $conn=mysql_connect('127.7.76.2','cat','c@t*9q');

  if(!$conn){
    die('connect failed'.mysql_error());
  }
  
  //2 选择数据库
  mysql_select_db("studySql");
  //3 设置操作编码,这个可以保证我们的php程序是按照utf-8码操作的。  
  //mysql_query("set names utf8");
  //4 发送sql指令
  
  $sql="select * from user1";
  //$res 表示结果集，可以理解为就是一张表
  $res=mysql_query($sql,$conn);
 // var_dump($res);
 
 //5 接受返回的结果，并处理。
 //mysql_fecth_row 会一次取出$res结果集的下一行数据，并依次赋值给$row（是一个数组）;
  while($row=mysql_fetch_row($res)){
  //第一种取法
  //  echo "</br> $row[0]--$row[1]--$row[2]";
  //第二种取法
    foreach($row as $key=>$val){
      echo "--$val";
    }
    echo "<br/>"
  }
  
  //关闭数据库连接，释放资源
  mysql_free_result($res);
  //mysql_close($conn)可以没有（因为即使没有，系统也会自动关闭），但是建议有。
  mysql_close($conn);
  
?>
