<?php

	require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
	require_once(ADMIN_CRUD_TOOL_PATH."adminFunctions.php");
?>
<?php 

    /**
	 *该函数通过session检查用户是否已经通过登陆验证。如果没有，将其送回登陆界面。
	 *
	 *@param void;
	 *@return void;
	 *
	 */
	
    function checkSessionInfo(){
		//session_start();
		if(!empty($_SESSION['adminId'])){
			if(!empty($_SESSION['adminPassword'])){
				if(!getAdminSessionInfo(array($_SESSION['adminId'],$_SESSION['adminPassword']))){
					sleep(3);
					header("Location:".ROOT_URL."login.php");
				}
			}
		}else {
			sleep(3);
			header("Location:".ROOT_URL."login.php");
	    }
	}
?>

