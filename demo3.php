<?php 

  function show_tab_info($table_name){
  
    $conn=mysql_conn("127.7.76.2","cat","c@t*9q");
    if(!$conn){
      die(mysql_error());
    }
    
    mysql_select_db("studySql",$conn);
    mysql_query("set names utf8");
    $sql="select * from $table_name";
    $res=mysql_query($sql,$conn);
    
    $field_info=mysql_field_row($res);
    var_dump($field_info);
    
  }
  
  show_tab_info("user1");

?>
