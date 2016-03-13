<?php
	//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
	//checkSessionInfo();


	/**
	 *该函数通过cookie获取上次登陆时间。
	 *
	 *@param void;
	 *@return void;
	 */
    function getLastTime(){
        //首先看看cookie有没有上次登陆信息
        if(!empty($_COOKIE['lastVisit'])){

            echo "上次访问 <b>duck</b>：".$_COOKIE['lastVisit'];
            //更新时间
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*360);
        }else{
            echo "朋友，你第一次访问 <b>duck</b> 哦 :)";
            //更新时间
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*360);
        }
    }
    
    /**
	 *该函数用于获取cookie的值。
	 *
	 *@param $key : String  #cookie的键名。
	 *@return $_COOKIE[$key] : Array #cookie该键名所对应的值。
	 */
	function getCookieVal($key){
            
        if(empty($_COOKIE[$key])){
            return "";
        }else{
            return $_COOKIE[$key];
        }
    }

?>