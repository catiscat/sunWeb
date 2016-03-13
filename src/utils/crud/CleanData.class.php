<?php
	//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
	//checkSessionInfo();
    
    
	//该函数用于过滤html标签，和一些特殊字符。
	function cleanData($link,$str){
		return mysqli_real_escape_string($link,strip_tags($str));	
        //        return $str;
	}
?>
