<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>阅读博文</title>
    </head>

<?php 

    //该页面要显示指定博文的详细信息
    require_once './adminBlogSystem/PostService.class.php';
    
    $id=$_GET['id'];
    echo "你正在阅读id=".$id."的博文";
    
    //查询数据库，调用sqlHelper  
    $postService=new PostService();
    $arr=$postService->getPostById($id);
?>
    <body>
        <h3><?php echo $arr[0]['post_title'] ?></h3><br/>
        <h4><?php echo $arr[0]['post_author'] ?></h4>
        <pre><?php echo $arr[0]['post_content'] ?></pre>
    </body>

</html>
