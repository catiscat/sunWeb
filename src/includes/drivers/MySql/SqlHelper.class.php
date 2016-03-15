<?php

?>
<?php 

    /**
     *
     *这是一个工具类，作用是完成对数据库的操作
     *execute_dml->更新 删除 添加语句 
     *execute_dql->查询语句
     *
     */

    class SqlHelper{
        
        public $conn;
        public $dbname="duckblog";
        public $username="adminz9QmQqP";
        public $password="yxeQ8twYmgKe";
        public $host="127.9.91.130";

        /**
         *该函数是一个连接mysql数据库的构造函数。
         *
         *初始化 $this->conn。
         *如果连接mysql数据库失败，echo 错误信息。
         *
         *@param void
         *@return void
         *
         */

        public function __construct(){
        
            $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
            if(!$this->conn){
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
   
        }
        
        /**
         *该函数用于执行数据库查询语句。
         *如果执行成功，返回$res，并释放资源;否则，echo 查询失败及错误信息。
         *
         *@param  $sql : String  #SQL查询语句
         *@return $res : Array(Array()) #是从mysqli_result对象中取出的 记录 ，一条记录是一个array，取出N条记录，形成一个二维array。
         *
         */
        
        public function execute_dql($sql){
            
            $arr=array();
            if ($res = mysqli_query($this->conn,$sql)) {

                $i=0;
                while($row=$res->fetch_assoc()){
                    $arr[$i++]=$row;
                }
                $res->free();
            }else{
                
                echo "查询失败:".mysqli_error($this->conn);
            }
            
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
        
            $res=mysqli_query($this->conn,$sql);
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
                mysqli_close($this->conn);
            }
        }
    }
?>
