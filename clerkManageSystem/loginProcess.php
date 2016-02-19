
<?php 

    require_once 'AdminService.class.php';
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
            header("Location:empManage.php?name=$name");
            exit();
        }else{
        	header("Location:login.php?errno=1");
	        exit();

        }
	


?>
