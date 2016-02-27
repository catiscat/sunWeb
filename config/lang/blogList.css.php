<?php 
    
    
    
    
    class Css{
    require_once "lang.class.php";
        $lan = new Langu();
        
    
    
  
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
            $title="";
            if($lan->getLang()=="zh"){
                $title="推荐帖子";
            }else if($lan->getLang()=="en"){
                $title="Recommend";
            }
            return $title;
        }
    }
    
    
?>
