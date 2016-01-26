<?php 

  require_once 'SqlTool.class.php';
  header("Content-type:text/html;charset=utf-8");

  //接受type
  if(isset($_POST['type'])){
    $type=$_POST['type'];
  }else{
    echo "输入为空";
    echo "<a href='mainView.php'>返回重新查询</a>";
  }

  if($type=="search1"){
      //接受英文单词
    if(isset($_POST['enword'])){
      $en_word=$_POST['enword'];
    }else{
      echo "输入为空";
      echo "<a href='mainView.php'>返回重新查询</a>";
    }
  
    //看看数据库中有没有这条记录, 加上 limit 0,1 效率会更高，指的是找到一个就返回。下面的不再去执行。
    //原则：用什么查什么
    $sql="select chword from words where enword='".$en_word."' limit 0,1";
    //设计表
    //查询
    $sqlTool=new SqlTool();
    $res=$sqlTool->excute_dql($sql);
    if($row=mysql_fetch_assoc($res)){
      echo $en_word."对应的中文意思是".$row['chword'];  
      echo "<br/><a href='mainView.php'>返回继续查询</a>";
    }else{
      echo "查询没有这个词条";
      echo "<br/><a href='mainView.php'>返回重新查询</a>";
    }	
  }


  
  mysql_free_result($res);
?>
