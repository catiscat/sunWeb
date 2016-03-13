<?php 

	
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(UTILS_PATH."switchThemes.php");
    
	/**
	 *
	 *该函数用于接收post请求提交过来的themeName，将对应的$themePath写入session。并跳回主页面。
	 *如果为空，将default/ 路径写入session。
	 *
	 *@param  $_REQUEST["themeName"]  String
	 *@return  void
	 */
	if(!empty($_REQUEST["themeName"])){
		$themePath=$_REQUEST["themeName"];
		//echo $themePath;
		session_start();
		$_SESSION['themePath']=$themePath;
		
	}else{
		session_start();
		$_SESSION['themePath']="default/";
	}
	
	header("Location:".ROOT_URL);
	
	
	


	

?>
