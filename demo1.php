<?php 
  //用mysql扩展库操作mysql数据库步骤如下：
  //1 获取数据库连接
  $conn=mysql_connect('127.7.76.2','cat','c@t*9q');

  if(!$conn){
    die('connect failed'.mysql_error());
  }
  
  //2 选择数据库
  mysql_select_db("studySql");
  //3 设置操作编码
  //4 发送sql指令
  
  $sql="select * from user1";
  $res=mysql_query($sql,$conn);
  var_dump($res);
?>
