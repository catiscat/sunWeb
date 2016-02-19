<html>
    <head>
        <meta charset="utf-8">
        <title>主界面</title>
    </head>
    
    <?php 
        require_once "login.php";
        echo "欢迎".$_GET['name']."登陆成功";
        echo "<br/><a href='login.php'>返回重新登陆</a>";
    ?>
    <body>
        <h1>主界面</h1>
        <a href="empList.php">管理用户</a><br>
        <a href="addEmp.php">添加用户</a><br>
        <a href="#">查询用户</a><br>
        <a href="#">退出系统</a><br>
    </body>
</html>






