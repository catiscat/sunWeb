<?php 

    //他的一个对象实例表示admin表的一条记录
    class Admin{
        private $id;
        private $name;
        private $password;
        
        public function getId(){
            return $this->id;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function getPassword(){
            return $this->password;
        }
    }

?>
