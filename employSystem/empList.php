<?php

    //查询数据
    $conn=mysql_connect("127.0.0.1","cat","c@t*9q") or die(mysql_error());
    
    mysql_query("set names utf8");
    mysql_select_db("test2",$conn);

/*    
    $pageSize=3;
    $rowCount=0;
    $pageNow=3;
    $pageCount=0;
*/  
    $sql="select * from emp";
    $res=mysql_query($sql，$conn);
    echo "<table border='1' width='700px'>";
    echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th></tr>";
    
    //这里需要循环地显示用户的信息
    while($row=mysql_fetch_assoc($res)){
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td></tr>";
        $rowCount=$row[0];
    }
    
    echo "<h1>雇员信息列表</h1>";
    echo "</table>";
  //  $pageCount=ceil($rowCount/$pageSize);

    //关闭资源
    mysql_free_result($res);
    mysql_close($conn);

?>
