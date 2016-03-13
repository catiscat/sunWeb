<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
	require_once(ADMIN_CRUD_TOOL_PATH."adminFunctions.php");
	//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
	//checkSessionInfo();
?>
<?php

    
	/**
	 *该函数用于接收post请求，检查 验证码、用户名、密码是否正确。
	 */
	session_start();
	if($_REQUEST['myCheckCode']==$_SESSION['myCheckCode']){
		$adminId=$_REQUEST['adminId'];
		$adminPassword=$_REQUEST['adminPassword'];
		if(getAdminInfo(array($adminId,$adminPassword))){
			
			$_SESSION['adminId']=$adminId;
			$_SESSION['adminPassword']=md5($adminPassword);
			header("Location:".USER_MANAGER_URL."manageAll.php");
		}else{			
			sleep(3);
			header("Location:".ROOT_URL."login.php");
		}
	}else {
			sleep(3);
			header("Location:".ROOT_URL."login.php");
	}
    
	
    
?>