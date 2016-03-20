<?php

    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(SQL_HELPER_PATH."SqlHelper.class.php");
    require_once(CRUD_TOOL_PATH."CleanData.class.php");
    //require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
    //checkSessionInfo();
?>

<?php 

    
    /**
     *该类用于验证admin的用户名、密码是否正确。
     */
        
    class AdminCRUD{
        
        
    
        /**
         *定义一个检测是否为空的函数，如果为空，终止运行，否则返回接收的值
         *
         *如果$str==0,{};
         *如果$str不为空，用cleanDate过滤 $str
         *否则，终止执行。
         *
         *@param $str: String
         *@return $str: String
         */    
        function isEmpty($str){
            if($str==0){}
            else if(!empty($str)){
    
                    $str=cleanData($str);        
            }else{
                echo $str."is empty";return;
            }
            return $str;
        }
        
        /**
         *该函数根据输入的 $adminId,$adminPassword 查找到 数据库中 admin 的admin_password,admin_name。
         *
         *@param $arr : Array    #array($adminId,$adminPassword);
         *@return  :  Boolean  # true 成功，false，失败.
         */
        function selectAdminInfo ($arr){
            $sqlHelper=new SqlHelper();
            $adminId=$this->isEmpty($arr[0]);
            $adminPassword=$this->isEmpty($arr[1]);
            $sql="select admin_password from admin where admin_id=$adminId ";
            
            $res=$sqlHelper->execute_dql($sql);
            $sqlHelper->close_connect();
            
            
            if( $res[0]['admin_password']==md5($adminPassword)){
                return true;
            }else {
                sleep(3);
                return false;
            }
        }
        
                /**
         *该函数根据输入的 $adminId,$adminPassword 查找到 数据库中 admin 的admin_password,admin_name。
         *
         *@param $arr : Array    #array($adminId,$adminPassword);
         *@return  :  Boolean  # true 成功，false，失败.
         */
        function selectAdminSessionInfo ($arr){
            $sqlHelper=new SqlHelper();
            $adminId=$this->isEmpty($arr[0]);
            $adminPassword=$this->isEmpty($arr[1]);
            $sql="select admin_password from admin where admin_id=$adminId ";

            $res=$sqlHelper->execute_dql($sql);
            $sqlHelper->close_connect();
            
            
            if( $res[0]['admin_password']==$adminPassword){
                return true;
            }else {
                sleep(3);
                return false;
            }
        }
    }
    
?>
