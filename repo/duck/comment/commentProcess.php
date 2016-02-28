<?php 
    
    require_once "CommentService.class.php";

   	
	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
	$sqlHelper=new SqlHelper();

   	//先看看用户要分页还是删除某个评论
	if(!empty($_REQUEST['flag'])){ 
	    //接收flag的值
	    $flag=$_REQUEST['flag'];
	    //如果$flag=="del"，说明用户要执行删除评论的请求
	    if($flag=="del"){
		    //这时我们知道要删除评论
		    $id=mysql_real_escape_string(strip_tags($_REQUEST['id']));
		    echo "你希望删除的评论id=$id";
		    if($commentService->delCommentById($id)==1){
		        //成功
		        header("Location:error.php");
		        exit();
		    }else{
		        //失败
		        header("Location:ok.php");
		        exit();
		    }
		}else if($flag=="addcomment"){
		    //说明用户要执行添加评论的请求
		    //接受数据
		    $comment_author=mysql_real_escape_string(strip_tags($_POST['comment_author']));
		    $comment_date=mysql_real_escape_string(strip_tags($_POST['comment_date']));
		    $comment_content=mysql_real_escape_string(strip_tags($_POST['comment_content']));
		    $comment_post_id=mysql_real_escape_string(strip_tags($_POST['comment_post_id']));
		    $comment_type=mysql_real_escape_string(strip_tags($_POST['comment_type']));
		    
		    //完成添加-》数据库
		    $res=$commentService->addComment($comment_author,$comment_date,$comment_content,$comment_post_id,$comment_type);
		    if($res=1){
		        header("Location:ok.php"); //操作成功
		        exit();
		    }else{
		        header("Location:error.php");//操作失败
		        exit();
		    }
		}else if($flag=="updatecomment"){
		    //说明用户希望执行修改评论
		    //接收数据
		    $id=mysql_real_escape_string(strip_tags($_POST['comment_id']));
		    $comment_author=mysql_real_escape_string(strip_tags($_POST['comment_author']));
		    $comment_date=mysql_real_escape_string(strip_tags($_POST['comment_date']));
		    $comment_content=mysql_real_escape_string(strip_tags($_POST['comment_content']));
		    $comment_post_id=mysql_real_escape_string(strip_tags($_POST['comment_post_id']));
		    $comment_type=mysql_real_escape_string(strip_tags($_POST['comment_type']));

		    
		    //完成修改-》数据库
		    $res=$commentService->updateComment($id,$comment_author,$comment_date,$comment_content,$comment_post_id,$comment_type);
		    /*
		    if($res=1){
		        header("Location:ok.php"); //操作成功
		        exit();
		    }else{
		        header("Location:error.php");//操作失败
		        exit();
		    }*/
		}
	} 

?>
