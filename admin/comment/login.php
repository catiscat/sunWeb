<! DOCTYPE="html">
    <html>
		<head>
			<meta charset="utf-8">
		</head>
		<h1>博客后台管理系统</h1>
		<form action="loginProcess.php" method="post">
			<table>
				<tr><td>用户名</td><td><input type="text" name="id"></td></tr>
				<tr><td>密码</td><td><input type="password" name="password"></td></tr>
				<tr><td><input type="submit" value="用户登陆"/></td><td><input type="reset" value="重新填写" /></td></tr>
			</table>
		</form>
		<?php 
			
		    //接收errno
		    if(!empty($_GET["errno"])){
		        $errno=$_GET["errno"];
		        if($errno==1){
		            echo "<br><font color='red' size='3'>用户名或密码错误，请重新输入";
		        }
		    }
		?>
	</html>

