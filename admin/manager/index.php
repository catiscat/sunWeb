<html>
    <head>
        <meta charset="utf-8">
        <title>主界面</title>
    </head>
    
    <?php 
    
    
        require_once "commen.php";
        checkUserValidate();
        getLastTime();
        echo "欢迎您登陆";
        echo "<br/><a href='login.php'>返回重新登陆</a>";
    ?>
    <body>
        <h1>主界面</h1>
        <a href="articleManager.php">管理博文</a><br>
        <a href="addPost.php">添加博文</a><br>
        <a href="#">查询博文</a><br>
        <a href="#">退出系统</a><br>
    </body>
</html>






