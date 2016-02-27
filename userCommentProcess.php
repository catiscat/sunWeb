<?php 
    
    require_once "./adminBlogSystem/comment/CommentService.class.php";

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
    //创建一个sqlHelper对象实例，用于让 mysql_real_escape_string()函数得到现在的连接。
    $sqlHelper=new SqlHelper();
    

    $checkCode=$_POST['checkcode'];	
	//先看看验证码是否ok
	session_start();
	if($checkCode!=$_SESSION['myCheckCode']){
	    header("Location:readPost.php?errno=2");
	    exit();
	}

   	//先看看用户要分页还是删除某个评论
	if(!empty($_REQUEST['flag'])){ 
	    //接收flag的值
	    $flag=$_REQUEST['flag'];
        
        if($flag=="addcomment"){
		    //说明用户要执行添加评论的请求
		    //接受数据
		    $comment_author=mysql_real_escape_string(strip_tags($_POST['comment_author']));
		//    $comment_date=mysql_real_escape_string(strip_tags($_POST['comment_date']));
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
