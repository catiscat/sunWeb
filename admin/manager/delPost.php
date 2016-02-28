<?php 
	echo "<meta charset='utf-8' />";
	require_once dirname(__FILE__)."/../../includes/postProcess.php";
        
	header("Location:".$_SERVER['HTTP_REFERER']);
?>
