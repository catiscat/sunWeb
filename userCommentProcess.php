<?php 
    
    require_once "./adminBlogSystem/comment/CommentService.class.php";
    //require_once "./adminBlogSystem/SqlHelper.class.php";

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
	
	//创建一个sqlHelper对象实例，用于让 mysql_real_escape_string()函数得到现在的连接。
    $sqlHelper=new SqlHelper();
    
   	//先看看用户要分页还是删除某个评论
	if(!empty($_REQUEST['flag'])){ 
	    //接收flag的值
	    $flag=$_REQUEST['flag'];
        
        if($flag=="addcomment"){
		    //说明用户要执行添加评论的请求
		    //接受数据,用strip_tags()函数将用户输入的html标签都去掉
		    //mysql_real_escape_string()函数用于过滤用户输入的特殊字符，如 / /n '' 等。
		    $comment_author=mysql_real_escape_string(strip_tags($_POST['comment_author']));
		    $comment_date=mysql_real_escape_string (strip_tags($_POST['comment_date']));
		    $comment_content=mysql_real_escape_string(strip_tags($_POST['comment_content']));
		    $comment_post_id=mysql_real_escape_string(strip_tags($_POST['comment_post_id']));
		  
		    
		    //完成添加-》数据库
		    $res=$commentService->addComment($comment_author,$comment_date,$comment_content,$comment_post_id);
		    if($res=1){
		        header("Location:ok.php"); //操作成功
		        exit();
		    }else{
		        header("Location:error.php");//操作失败
		        exit();
		    }
		}
	} 

?>
