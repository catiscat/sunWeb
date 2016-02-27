<?php 

    class Lang{
        private $lang = "zh";
        
        function getLang(){
            return $this->lang;
        }
        function setLangZh(){
            $this->lang="zh";
        }
        function setLangEn(){
            $this->lang="en";
        }
        
        function setLangDefault(){
            $this->lang="zh";
        }
        
        function setColor(){
            
        }
        
        function setFont(){
            
        }
    } 
?>
