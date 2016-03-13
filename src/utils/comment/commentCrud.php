<?php 
    echo "<meta charset='utf-8'/>";
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
	require_once(CRUD_TOOL_PATH."CommentCRUD.class.php");
	require_once(INCLUDES_PATH."checkSessionInfo.php");
	
?>

<?php
    $commentCRDU = new CommentCRUD();
    $commentCRDU->construct();
	if($commentCRDU->flag=="addComment"){
		sleep(3);
		session_start();
		if($_REQUEST['myCheckCode']==$_SESSION['myCheckCode']){
			$commentCRDU->getAddRes();
			$commentCRDU->goBack();
		}else{
			sleep(1);
			$commentCRDU->goBack();
		}
	}else{
	    checkSessionInfo();
		if ($commentCRDU->getRes()!=0){}else {echo "失败"; sleep(3);}
		header("Location:".USER_MANAGER_URL."manageComment.php");
	}
?>
