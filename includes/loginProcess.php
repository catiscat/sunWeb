
<?php 

    require_once 'AdminService.php';

    //接受用户数据,strip_tags()函数用于过滤掉所有的html标签
    // 1 id

    $sqlHelper=new SqlHelper();
    $id=mysql_real_escape_string(strip_tags($_POST["id"]));
	
	$checkCode=$_POST['checkcode'];
	
	//先看看验证码是否ok
	session_start();
	if($checkCode!=$_SESSION['myCheckCode']){
	    header("Location:../admin/manager/login.php?errno=2");
	    exit();
	}
	
	
    //2 密码
    $password=mysql_real_escape_string(strip_tags($_POST["password"]));
        
        //实例化一个AdminService方法
        $adminService=new AdminService();
        $name=$adminService->checkAdmin($id,$password);
        if($name!=""){
            //合法
            session_start();
            $_SESSION['loginuser']=$name;
            
            header("Location:postManage.php");
            exit();
        }else{
            //不合法
            header("Location:login.php?errno=1");
	        exit();

        }
	


?>
