<?php 

    require_once "SqlHelper.class.php";
    
    class PostService{
    
        function updatePost($id,$post_author,$post_date,$post_summary,$post_content,$post_title,$post_type){
            $sql="update posts set post_author='$post_author',post_date='$post_date',post_summary='$post_summary',post_content='$post_content',post_title='$post_title',post_type='$post_type' where id=$id";
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }
    
    
        //根据id号获取一个博文的信息
        function getPostById($id){
            
            $sql="select * from posts where id=$id";
            $sqlHelper=new SqlHelper();
            $arr=$sqlHelper->execute_dql2($sql);
            $sqlHelper->close_connect();
            
            return $arr;
        }
    
        //添加博文的方法
        function addPost($post_author,$post_date,$post_summary,$post_content,$post_title,$post_type){
            //做一个$sql语句,字符串需要用''包起来
            $sql="insert into posts(post_author,post_date,post_summary,post_content,post_title,post_type) values ('$post_author','$post_date','$post_summary',$post_content','$post_title','$post_type')";
            //通过sqlHelper完成添加
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }


	    function getPageCount($pageSize){
	
	        //需要查询 $rowCount
		    $sql="select count(id) from posts";
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
	    
	    
	    //一个函数可以获取应当显示的博文信息
	    function getPostListByPage($pageNow,$pageSize){
	       
	       $sql="select * from posts limit ".($pageNow-1)*$pageSize.",".$pageSize;
	       
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
	        $sql1="select * from posts limit ".($rollPage->pageNow-1)*$rollPage->pageSize.",".$rollPage->pageSize;
	        
	        $sql2="select count(id) from posts";
	        $sqlHelper->execute_dql_roll($sql1,$sql2,$rollPage);
	        
	        $sqlHelper->close_connect();
	    }

        //根据输入id删除某个用户
        function delPostById($id){
            $sql="delete from posts where id=$id";
            //创建SqlHelper对象实例
            $sqlHelper=new SqlHelper();
            
            return $sqlHelper->execute_dml($sql);
        }		

    }
?>
