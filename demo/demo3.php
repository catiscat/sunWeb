<?php 

  function show_tab_info($table_name){
  
    $conn=mysql_connect("127.7.76.2","cat","c@t*9q");
    if(!$conn){
      die(mysql_error());
    }
    
    mysql_select_db("studySql",$conn);
    mysql_query("set names utf8");
    $sql="select * from $table_name";
    $res=mysql_query($sql,$conn);
    
    $rows=mysql_affected_rows($conn);
    $colums=mysql_num_fields($res);
    echo "$rows=$colums";
    
    echo "<table border=1><tr>";
    for($i=0;$i<$colums;$i++){
      $field_name=mysql_field_name($res,$i);
      echo "<th>$field_name</th>";
    }
    echo "</tr>";
    
    while($row=mysql_fetch_row($res)){
      echo "<tr>";
      for($i=0;$i<$colums;$i++){
        echo "<td>$row[$i]</td>";
      }
    }
    
    echo "</table>";
    while($field_info=mysql_fetch_field($res)){
      echo "<br/>".$field_info->name;
    }
  //  var_dump($field_info);
    
  }
  
  show_tab_info("user1");

?>
