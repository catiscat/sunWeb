<?php 

    //这是一个工具类，作用是完成对数据库的操作
    class SqlHelper{
        
        public $conn;
        public $dbname="empmanage";
        public $username="fish";
        public $password="c@t*9q";
        public $host="127.0.0.1";
        
        public function __construct(){
        
            $this->conn=mysql_connect($this->host,$this->username,$this->password);
            if(!$this->conn){
                die("连接失败".mysql_error());
            }
            mysql_select_db($this->dbname,$this->conn);
        }
        
        //执行dql语句,但返回的是一个数组，数组的资源可以被垃圾回收机制自动回收，就不必担心什么时候去关闭链接，释放资源了
        public function execute_dql2($sql){
            
            $arr=array();
            $res=mysql_query($sql,$this->conn) or die(mysql_error());
            $i=0;
            //把 $res 导入到 $arr中去
            while($row=mysql_fetch_assoc($res)){
                $arr[$i++]=$row;
            }
            //这里就可以马上把结果集 $res 关闭
            mysql_free_result($res);
            return $arr;
        }
        
        //考虑分页情况的查询，这是一个比较通用的并体现OOP（面向对象）的思想。
        //$sql1="select * from 表名 limit 0,6";
        //$sql2="select count(id) from 表名"; 
        public function execute_dql_roll($sql1,$sql2,$rollPage){
            
            //查询要分页显示的数据
            $res=mysql_query($sql1) or die(mysql_error());
            //$res => $array()
            $arr=array();
            //把$res转移到$arr
            while($row=mysql_fetch_assoc($res)){
                $arr[]=$row;
            }
            
            mysql_free_result($res);
            $res2=mysql_query($sql2,$this->conn) or die(mysql_error());
            
            if($row=mysql_fetch_row($res2)){
                $rollPage->pageCount=ceil($row[0]/$rollPage->pageSize);
                $rollPage->rowCount=$row[0];
            }
            
            
            mysql_free_result($res2);
            //把导航信息也封装到$rollPage对象中
          
            $navigate="";
	        if($rollPage->pageNow>1){
	            $prePage=$rollPage->pageNow-1;
	            $navigate="<a href='empList.php?pageNow=$prePage'>上一页</a>$nbsp";
	        }
	
	        if($rollPage->pageNow<$rollPage->pageCount){
	            $nextPage=$rollPage->pageNow+1;
	            //$navigate. 是将字符串拼接起来
	            $navigate.="<a href='{$rollPage->gotoUrl}?pageNow=$nextPage'>下一页</a>$nbsp";
	        }
	        
	        	//可以使用for打印超链接	
	
	        $page_whole=10;//整体每10页向后翻
	        $start=floor(($rollPage->pageNow-1)/$page_whole)*10+1;
	        $index=$start;
	
	        //整体每10页向前翻
	        //如果当前 $pageNow 在1-10页数之内，就没有向前翻动的超链接
	        if($rollPage->pageNow>10){
	            $navigate.= "&nbsp;&nbsp;<a href='{$rollPage->gotoUrl}?pageNow=".($start-1)."'>&nbsp;&nbsp;<< &nbsp;&nbsp;</a>";
	        }
	        //定$start 1 --->10 floor(($pageNow-1)/10) 11->20
	        for($start<($index+10);$start++){
	            $navigate.= "<a href='{$rollPage->gotoUrl}?pageNow=".$start."'>[$start]</a>";

	        }
	
	        //整体每10页翻动
	        $navigate.="&nbsp;&nbsp;<a href='{$rollPage->gotoUrl}?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;&nbsp;</a>";
	
	        //显示当前页和共有多少页,{}有隔离的作用，大括号里面是变量
	        $navigate.= "当前页{$rollPage->pageNow}/共{$rollPage->pageCount}页";
	        
	        
	        
	        
            
            //把$arr赋给$rollPage
            $rollPage->res_array=$arr;
            $rollPage->navigate=$navigate;
        }
        
        //执行dql语句
        public function execute_dql($sql){
            
            $res=mysql_query($sql,$this->conn) or die(mysql_error());
            $return $res;
        }
        
        
        //执行dml语句
        public function execute_dml($sql){
        
           $b=mysql_squery($sql,$this->conn) or die(mysql_error());
           if(!$b){
            return 0;
           }else{
            if(mysql_affected_rows(($this->conn)>0)){
                return 1;//表示执行成功
            }else{
                return 2;//表示没有行受到影响
            }
            
           } 
        }
        
        //关闭连接的方法
        public function close_connect(){
            
            if(!empty($this->conn)){
                mysql_close($this->conn);
            }
        }
    }
?>
