<?php 

  $conn=mysql_connect('127.7.76.2','cat','c@t*9q');
  if(!$conn){
    die('出错了'.mysql_error());    
  }
  
  mysql_select_db('studySql',$conn) or die(mysql_error());
  
  mysql_query("set names utf8");
  
 // $sql="insert into user1(name,password,email,age) values('小明',md5(123),'xiaoming@gmail.com',16)";
  
 // $sql="delete from user1 where id=6";
 
  $sql="update user1 set age=61 where id=7";
  //如果是dml操作，则返回布尔值，布尔值最后不需要释放资源，否则会报错。
  $res=mysql_query($sql,$conn);
  
  if(!$res){
    die("操作失败".mysql_error());
  }
  
  if(mysql_affected_rows($conn)>0){
    echo "";
  }else{
    echo "没有受到影响的行数";
  }
  
  mysql_close($conn);


?>