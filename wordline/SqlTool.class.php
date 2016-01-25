<?php 
  class SqlTool{
    private $conn;
    private $host="127.7.76.2";
    private $user="cat";
    private $password="c@t*9q";
    private $db="studySql";
    
    function sqlTool(){
      $this->conn=mysql_connect($this->host,$this->$user,this->$password);
      if(!$this->conn){
        die("连接数据库失败".mysql_error());
      }
      mysql_select_db($db,$this->conn);
      mysql_query("set names utf8");
    }
    
    function excute_dql($sql){
      
    }
    
    //完成update delete insert 操作
    public function excute_dml($sql){
      $res=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$res){
        return 0; //操作不成功
      }else{
        if(mysql_affected_rows($this->conn)>0){
          return 1;//操作成功
        }else{
          return 2;//没有行数影响。
        }
      }
    }
    
  }

?>
