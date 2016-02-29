<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>
    <?php 

    //该页面要显示准备修改评论的信息
    require_once(dirname(__FILE__)."/../../includes/commen.php");   
    checkUserValidate();
    
    
    require_once dirname(__FILE__)."/../../includes/PostService.class.php";
    $sqlHelper=new SqlHelper();

    $id=mysql_real_escape_string(strip_tags($_GET['id']));
    //通过id得到该评论的其他信息
    //查询数据库，调用sqlHelper
    
    $postService=new PostService("comments");
    $arr=$postService->getPostById($id);
    
    ?>
    
    
    <h1>修改</h1>
    <?php
        require_once (dirname(__FILE__)."/../content/themes/default/updateCommentTable.php");
	    updateCommentTable($arr);
    ?>
</html>
