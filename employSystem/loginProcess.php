
<?php 

    //接受用户数据
    // 1 id
    $id=$_POST["id"];
    //2 密码
    $password=$_POST["password"];
	/*
    //简单验证
    if($id=="100" && $password=="123"){
        //合法，跳转到empManage.php
        header("Location:empManage.php");
        exit();
    }else{
        //非法用户，重新登陆
        header("Location:login.php?errno=1");
        exit();
    }
	*/
	
	//连接到数据库
	$conn=mysql_connect("127.0.0.1","fish","c@t*9q");
	if(!$conn){
		die("连接失败".mysql_errno());
	}
	//设置访问数据库的编码
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	//选择数据库
	mysql_select_db("test2",$conn) or die(mysql_error());
	//发送sql语句，验证登陆是否成功
	//防止sql注入攻击
	//变化验证逻辑
	$sql="select * from admin where id=$id";
	//通过输入的id来获取数据库的密码，然后再和输入密码比对。

	$res=mysql_query($sql,$conn);
	if($row=mysql_fetch_assoc($res)){
	
		//查询到
		//取出数据库密码
		if($row['password']==md5($password)){
		//说明合法
		}else{
			header("Location:empManage.php");
			exit();
		}
	}else{
	    header("Location:login.php?errno=2");
	    exit();
	}

    //关闭资源
    mysql_free_result($res);
    mysql_close($conn);
?>
