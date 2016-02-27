<?php 

    session_start();
    $checkCode="";
    for($i=0;$i<4;$i++){
        $checkCode.=dechex(rand(1,15));
    }
    
    //将随机验证码保存到session中
    $_SESSION['myCheckCode']=$checkCode;
    //创建图片，并把随机数画上去
    $img=imagecreatetruecolor(110,30);
    //背景默认就是黑色
    //你可以指定背景颜色
    $bgcolor=imagecolorallocate($img,0,0,0);
    imagefill($img,0,0,$bgcolor);
    //创建新的颜色
    $white=imagecolorallocate($img,255,255,255);
    $blue=imagecolorallocate($img,0,0,255);
    $red=imagecolorallocate($img,255,0,0);
    $green=imagecolorallocate($img,255,0,0);
    
    //画出干扰线段
    for($i=0;$i<20;$i++){
        imageline($img,rand(0,110),rand(0,30),rand(0,110),rand(0,30),imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255)));
    }
    
    //画字符串
    imagestring($img,rand(1,5),rand(2,80),rand(2,10),$checkCode,$white);
    
    //输出图片
    header("content-type:image/png");
    imagepng($img);
?>
