<?php 
    
    require_once "./adminBlogSystem/comment/CommentService.class.php";

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();

   	//先看看用户要分页还是删除某个评论
	if(!empty($_REQUEST['flag'])){ 
	    //接收flag的值
	    $flag=$_REQUEST['flag'];
        
        if($flag=="addcomment"){
		    //说明用户要执行添加评论的请求
		    //接受数据,并将用户输入的html标签都去掉
		    $comment_author=strip_tags(mysqli_real_escape_string($_POST['comment_author']));
		    $comment_date=strip_tags(mysqli_real_escape_string($_POST['comment_date']));
		    $comment_content=strip_tags(mysqli_real_escape_string($_POST['comment_content']));
		    $comment_post_id=strip_tags(mysqli_real_escape_string($_POST['comment_post_id']));
		  
		    
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
