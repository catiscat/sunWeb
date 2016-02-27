<?php 

    class Langu{
        public $lang = "en";
        
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
            $this->lang="en";
        }
        

    } 
?>
