<?php 
    echo "<meta charset='utf-8' />";
    require_once "PostService.class.php";

   	
	//创建了一个PostService的对象实例
	$postService=new PostService();
	$sqlHelper=new SqlHelper();

   	//先看看用户要分页还是删除某个博文
	if(!empty($_REQUEST['flag'])){ 
	    //接收flag的值
	    $flag=$_REQUEST['flag'];
	    //如果$flag=="del"，说明用户要执行删除博文的请求
	    if($flag=="del"){
		    //这时我们知道要删除博文
		    $id=$_REQUEST['id'];

		}else if($flag=="addpost"){
		    //说明用户要执行添加博文的请求
		    //接受数据
		    $post_author=mysql_real_escape_string(strip_tags($_POST['post_author']));
		    $post_date=mysql_real_escape_string(strip_tags($_POST['post_date']));
		    $post_summary=mysql_real_escape_string(strip_tags($_POST['post_summary']));
		    $post_content=mysql_real_escape_string(strip_tags($_POST['post_content']));
		    $post_title=mysql_real_escape_string(strip_tags($_POST['post_title']));
		    $post_type=mysql_real_escape_string(strip_tags($_POST['post_type']));
		    
		    //完成添加-》数据库
		    $res=$postService->addPost($post_author,$post_date,$post_summary,$post_content,$post_title,$post_type);

		}else if($flag=="updatepost"){
		    //说明用户希望执行修改博文
		    //接收数据
		    $id=mysql_real_escape_string(strip_tags($_POST['id']));
		    $post_author=mysql_real_escape_string(strip_tags($_POST['post_author']));
		    $post_date=mysql_real_escape_string(strip_tags($_POST['post_date']));
		    $post_summary=mysql_real_escape_string(strip_tags($_POST['post_summary']));
		    $post_content=mysql_real_escape_string(strip_tags($_POST['post_content']));
		    $post_title=mysql_real_escape_string(strip_tags($_POST['post_title']));
		    $post_type=mysql_real_escape_string(strip_tags($_POST['post_type']));
		    
		    //完成修改-》数据库
		    $res=$postService->updatePost($id,$post_author,$post_date,$post_summary,$post_content,$post_title,$post_type);
		   
		}
	} 

?>
