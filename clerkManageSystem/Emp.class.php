<?php 
    
    //这个类的一个对象实例，表示一条雇员记录
    class Emp{
    
        private $id;
        private $name;
        private $grade;
        private $email;
        private $salary;
        
        public function getId(){
            return $this->id;
        } 
        
        public function getName(){
            return $this->name;
        }
        
        public function getGrade(){
            return $this->grade;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function getSalary(){
            return $this->salary;
        }
        

	}

?>
