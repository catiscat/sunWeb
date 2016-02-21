<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>阅读评论</title>
    </head>

<?php 

    //该页面要显示指定评论的详细信息
    require_once 'CommentService.class.php';
    
    $id=$_GET['id'];
    echo "你正在阅读id=".$id."的评论";
    
    //查询数据库，调用sqlHelper  
    $commentService=new CommentService();
    $arr=$commentService->getCommentById($id);
?>
    <body>
        <h4><?php echo $arr[0]['comment_author'] ?></h4>
        <pre><?php echo $arr[0]['comment_content'] ?></pre>
    </body>

</html>
