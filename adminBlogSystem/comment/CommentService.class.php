<?php 

    require_once "SqlHelper.class.php";
    
    class CommentService{
    
        function updateComment($id,$comment_author,$comment_date,$comment_content,$comment_type,$comment_post_id){
            $sql="update comments set comment_author='$comment_author',comment_date='$comment_date',comment_content='$comment_content',comment_type='$comment_type' ,comment_post_id='$comment_post_id' where comment_id=$id";
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }
    
    
        //根据id号获取一个评论的信息
        function getCommentById($id){
            
            $sql="select * from comments where comment_id=$id";
            $sqlHelper=new SqlHelper();
            $arr=$sqlHelper->execute_dql2($sql);
            $sqlHelper->close_connect();
            
            return $arr;
        }
    
        //添加评论的方法
        function addComment($comment_author,$comment_date,$comment_content,$comment_type,$comment_post_id){
            //做一个$sql语句,字符串需要用''包起来
            $sql="insert into comments(comment_author,comment_date,comment_content,comment_type,comment_post_id) values ('$comment_author','$comment_date','$comment_content','$comment_type','$comment_post_id')";
            //通过sqlHelper完成添加
            $sqlHelper=new SqlHelper();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }


	    function getPageCount($pageSize){
	
	        //需要查询 $rowCount
		    $sql="select count(comment_id) from comments";
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
	    
	    
	    //一个函数可以获取应当显示的评论信息
	    function getCommentListByPage($pageNow,$pageSize){
	       
	       $sql="select * from comments limit ".($pageNow-1)*$pageSize.",".$pageSize;
	       
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
	        $sql1="select * from comments limit ".($rollPage->pageNow-1)*$rollPage->pageSize.",".$rollPage->pageSize;
	        
	        $sql2="select count(comment_id) from comments";
	        $sqlHelper->execute_dql_roll($sql1,$sql2,$rollPage);
	        
	        $sqlHelper->close_connect();
	    }

        //根据输入id删除某个评论
        function delCommentById($id){
            $sql="delete from comments where comment_id=$id";
            //创建SqlHelper对象实例
            $sqlHelper=new SqlHelper();
            
            return $sqlHelper->execute_dml($sql);
        }		

    }
?>
