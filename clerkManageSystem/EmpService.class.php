<?php 

    require_once "SqlHelper.class.php";
    
    class EmpService{
    
        function updateEmp($id,$name,$grade,$email,$salary){
            $sql="update emp set name='$name',grade='$grade',email='$email',salary='$salary' where id=$id";
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }
    
    
        //根据id号获取一个雇员的信息
        function getEmpById($id){
            
            $sql="select * from emp where id=$id";
            $sqlHelper=new SqlHelper();
            $arr=$sqlHelper->execute_dql2($sql);
            $sqlHelper->close_connect();
            
            return $arr;
        }
    
        //添加用户的方法
        function addEmp($name,$grade,$email,$salary){
            //做一个$sql语句,字符串需要用''包起来
            $sql="insert into emp(name,grade,email,salary) values ('$name',$grade,'$email',$salary)";
            //通过sqlHelper完成添加
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }


	    function getPageCount($pageSize){
	
	        //需要查询 $rowCount
		    $sql="select count(id) from emp";
		    $sqlHelper=new SqlHelper();
		    $res=$sqlHelper->execute_dql($sql);

		    //这样就可以计算$pageCount
		    if($row=mysql_fetch_row($res)){
				    $pageCount=ceil($row[0]/$pageSize);
		    }

		    //释放资源关闭链接
		    mysql_free_result($res);
		    $sqlHelper->close_connect();
		    return $pageCount;		
	    }
	    
	    //一个函数可以获取应当显示的雇员信息
	    function getEmpListByPage($pageNow,$pageSize){
	        
	        $sql="select * from emp limit ".($pageNow-1)*$pageSize.",".$pageSize;
	        $sqlHelper=new SqlHelper();
	        $res=$sqlHelper->execute_dql2($sql);
	        
	        //释放资源，关闭链接
	        //mysql_free_result();
	        $sqlHelper->close_connect();
	        return $res;
	    }
	    
	    //第二种 使用封装的方式完成的分页
	    function getRollPage($rollPage){
	        //创建一个sqlHelper对象实例
	        $sqlHelper=new SqlHelper();
	        $sql1="select * from emp limit".($rollPage->pageNow-1)*$rollPage->pageSize.",".$rollPage->pageSize;
	        $sql2="select count(id) from emp";
	        $sqlHelper->execute_dql_roll($sql1,$sql2,$rollPage);
	        
	        $sqlHelper->close_connect();
	    }

        //根据输入id删除某个用户
        function delEmpById($id){
            $sql="delete from emp where id=$id";
            //创建SqlHelper对象实例
            $sqlHelper=new SqlHelper();
            
            return $sqlHelper->execute_dml($sql);
        }		

    }
?>
