<?php

    /**
     *该函数用于根据用户提交的主题名称在conf.xml文件中查询到该主题对应的路径。
     *如果提交的主题名称不存在，$themePath="default/"；否则返回对应的路径。
     *
     *@param  $themeName  String
     *@return  $themePath  String
     *
     */
    function getThemePath($themeName){
        
        /**
         *该函数用于根据节点对象和标签名取出对应标签节点的值。
         *
         *@param  $MyNode Object
         *@param  $tagName  String
         *@return  String
         */
        function getNodeValue($MyNode,$tagName){
            return $MyNode->getElementsByTagName($tagName)->item(0)->nodeValue;
        }
        
        $xmldoc=new DOMDocument();
        $xmldoc->load("conf.xml");

        $themeName=$_REQUEST['themeName'];
        $themes=$xmldoc->getElementsByTagName("theme");
        $isEnter=false;
 
        for($i=0;$i<$themes->length;$i++){
             
            $theme=$themes->item($i);  
            if($themeName==getNodeValue($theme,"themeName")){
                $isEnter=true;
                $themePath=getNodeValue($theme,"themePath");
            }
        }
         
        if(!$isEnter){
            $themePath="default/";
        }    
        return $themePath;
    }


    

?>