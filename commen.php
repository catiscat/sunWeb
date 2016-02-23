<?php 

    function getLastTime(){
        //首先看看cookie有没有上次登陆信息
        if(!empty($_COOKIE['lastVisit'])){

            echo "上次访问<b>duck</b>：".$_COOKIE['lastVisit'];
            //更新时间
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
        }else{
            echo "朋友，你第一次访问 <b>duck</b> 哦 :)";
            //更新时间
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
        }
    }
    
    
	function getCookieVal($key){
            
        if(empty($_COOKIE[$key])){
            return "";
        }else{
            return $_COOKIE[$key];
        }
    }
        
      //把验证用户是否合法封装成函数
    function checkUserValidate(){
        session_start();
        if(empty($_SESSION['loginuser'])){
            header("Location:login.php?errno=1");
        }
     }
    
?>
