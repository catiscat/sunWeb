<?php 
	//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
	//checkSessionInfo();
    /**
	 *这是一个用于一键切换语言的类。未完待续。
	 */
    class Lang{
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
