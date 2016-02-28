<! DOCTYPE="html">
    <html>
		<head>
			<meta charset="utf-8">
		</head>
		<h1>博客后台管理系统</h1>
		
		<?php 
		    require_once(dirname(__FILE__)."/../../themes/default/loginTable.php");
		    loginTable("用户名","密&nbsp;码","验证码","登陆","重新填写");
		?>
		
		<?php 
		    //接收errno
		    if(!empty($_GET["errno"])){
		        $errno=$_GET["errno"];
		        if($errno==1){
		            echo "<br><font color='red' size='3'>用户名或密码错误，请重新输入";
		        }else if($errno==2){
		            echo "<br><font color='red' size='3'>验证码错误，请重新输入";
		        }
		    }
		?>
	</html>

