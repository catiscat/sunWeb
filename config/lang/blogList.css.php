<?php 
    require_once "lang.class.php";
    
    
    
    class Css{
        $lan = new Langu();
        $title="";
    
    
  
        function setdiv5Lang($language){
            /*
            if($language=="zh"){
                $lan->setLangZh();
            }else if($language=="en"){
            
                $lan->setLangEn();
            }else{
                $lan->setLangDefault();
            }*/
            if($language=="zh"){
                $lan->setLangZh();
            }else if($language=="en"){
            
                //$lan->setLangEn();
            }
        }
        

        function div5(){
            
            if($lan->getLang()=="zh"){
                $title="推荐帖子";
            }else if($lan->getLang()=="en"){
                $title="Recommend";
            }
            return $title;
        }
    }
    
    
?>
