<?php
        require_once($_SERVER['DOCUMENT_ROOT']."load.php");
        require_once (CRUD_TOOL_PATH."AdminCRUD.class.php");

?>

<?php

    //
    //$adminId=$_REQUEST['adminId'];
    //$adminPassword=$_REQUEST['adminPassword'];
    //$arr=array($adminId,$adminPassword);
    /**
     *该函数根据输入的 $adminId,$adminPassword 查找到 数据库中 admin 的admin_password,admin_name。在数据库验证.
     *
     *@param $arr : Array    #array($adminId,$adminPassword);
     *@return  :  Boolean    #true 成功，false，失败.
     */    
    
    function getAdminInfo($arr){
        
        $adminCRUD =new AdminCRUD();
        $res=$adminCRUD->selectAdminInfo($arr);
        return $res;        
    }
    
    function getAdminSessionInfo($arr){
        $adminCRUD =new AdminCRUD();
        $res=$adminCRUD->selectAdminSessionInfo($arr);
        return $res;    
    }


?>