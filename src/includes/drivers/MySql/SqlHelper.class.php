<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");


?>

<?php

    /**
     *@author  kcleung
     *kcleung at kcleung dot no-ip dot org 03-May-2010 12:47
     *该类用于通过PDO进行数据库操作。
     */
    class Database {
        private static $link = null ;
        private static function getLink ( ) {
            if ( self :: $link ) {
                return self :: $link ;
            }
            $ini = CONFIG_PATH."config.ini" ;
            $parse = parse_ini_file ( $ini , true ) ;
            $driver = $parse [ "db_driver" ] ;
            $dsn = "${driver}:" ;
            $user = $parse [ "db_user" ] ;
            $password = $parse [ "db_password" ] ;
            $options = $parse [ "db_options" ] ;
            $attributes = $parse [ "db_attributes" ] ;
            foreach ( $parse [ "dsn" ] as $k => $v ) {
                $dsn .= "${k}=${v};" ;
            }
            self :: $link = new PDO ( $dsn, $user, $password, $options ) ;
            foreach ( $attributes as $k => $v ) {
                self :: $link -> setAttribute ( constant ( "PDO::{$k}" )
                    , constant ( "PDO::{$v}" ) ) ;
            }
            return self :: $link ;
        }
        public static function __callStatic ( $name, $args ) {
            $callback = array ( self :: getLink ( ), $name ) ;
            return call_user_func_array ( $callback , $args ) ;
        }
    }

    /**
     *
     *这是一个工具类，作用是完成对数据库的操作
     *execute_dml->更新 删除 添加语句 
     *execute_dql->查询语句
     *
     */

    class SqlHelper{
        public $conn;

        /**
         *该函数用于执行数据库查询语句。
         *如果执行成功，返回$res，并释放资源;否则，echo 查询失败及错误信息。
         *
         *@param  $sql : String  #SQL查询语句
         *@return $res : Array(Array()) #是从mysqli_result对象中取出的 记录 ，一条记录是一个array，取出N条记录，形成一个二维array。
         *
         */
        
        public function execute_dql($sql){
            
            

            $this->conn = Database::prepare($sql) ;
            $this->conn -> execute ();
            $arr=$this->conn -> fetchAll () ;
            return $arr;
        }
        

        
        /**
         *该函数用于执行SQL增、删、改的语句。
         *如果执行成功，返回1;否则，echo 查询失败及错误信息。返回 0。
         *
         *@param   $sql : String  #SQL增、删、改语句
         *@return $res : Int # 成功,返回 1, 否则，返回 0。
         *
         */
        
        public function execute_dml($sql){
 
            $this->conn = Database :: prepare ( $sql ) ;
            $res=$this->conn -> execute () ;

            if(!$res){
                echo "查询失败:".mysqli_error($this->conn);
                return 0;
            }else{
                return 1; 
            } 
        }
        
        
        /**
         *该函数用于关闭mysql数据库连接。
         *
         *@param void
         *@return void
         *
         */
        public function close_connect(){
            
            if(!empty($this->conn)){
                $this->conn -> closeCursor() ;
            }
        }
    }
?>
