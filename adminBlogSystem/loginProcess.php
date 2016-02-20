
<?php 

    require_once 'AdminService.php';
    //接受用户数据
    // 1 id
    $id=$_POST["id"];
    //2 密码
    $password=$_POST["password"];
        
        //实例化一个AdminService方法
        $adminService=new AdminService();
        $name=$adminService->checkAdmin($id,$password);
        if($name!=""){
            //合法
            header("Location:postManage.php?name=$name");
            exit();
        }else{
            //不合法
            header("Location:login.php?errno=1");
	        exit();

        }
	


?>
