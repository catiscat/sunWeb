<?php 

    public class Lang{
        private $lang = "zh";
        
        public function getLang(){
            return $this->lang;
        }
        public function setLangZh(){
            $this->lang="zh";
        }
        public function setLangEn(){
            $this->lang="en";
        }
        
        public function setLangDefault(){
            $this->lang="zh";
        }
        
        public function setColor(){
            
        }
        
        public function setFont(){
            
        }
    } 
?>
