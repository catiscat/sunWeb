<?php 
    
    
    class Lang{
        public $lang = "en";
    
        function getLang(){
            return $lang;
        }
        function setLangZh(){
            $lang="zh";
        }
        function setLangEn(){
            $lang="en";
        }
        
        function setLangDefault(){
            $lang="en";
        }
    }
    

?>
