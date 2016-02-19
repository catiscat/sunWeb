<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>
    <?php 

    //该页面要显示准备修改的用户信息
    
    require_once 'EmpService.class.php';
    $id=$_GET['id'];
    //通过id得到该用户的其他信息
    //查询数据库，调用sqlHelper
    
    $empService=new EmpService();
    $arr=$empService->getEmpById($id);
    
    ?>
    
    
    <h1>修改雇员</h1>
    <form action="empProcess.php" method="post">
        <table>
            <tr><td>ID号</td><td><input readonly="readonly" type="text" name="id" value="<?php echo $arr[0]['id'] ?>" /></td></tr>        
            <tr><td>名字</td><td><input type="text" name="name" value="<?php echo $arr[0]['name'] ?>" /></td></tr>
            <tr><td>级别</td><td><input type="text" name="grade" value="<?php echo $arr[0]['grade'] ?>" /></td></tr>
            <tr><td>电邮</td><td><input type="text" name="email" value="<?php echo $arr[0]['email'] ?>" /></td></tr>         
            <tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $arr[0]['salary'] ?>" /></td></tr>
            <input type="hidden" name="flag" value="updateemp" />
            <tr><td><input type="submit" value="修改用户" /></td><td><input type="reset" value="重新填写" /></td></tr>
        </table>
    </form>
</html>
