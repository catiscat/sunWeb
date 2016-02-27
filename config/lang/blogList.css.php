<?php 
    require_once "lang.class.php";
    
    

        
        function div5(){
            $lan = new Lang();
            $title="";
            if($lan->getLang()=="zh"){
                $title="推荐帖子";
            }else if($lan->getLang()=="en"){
                $title="Recommend";
            }
            return $title;
        }

    
    
?>
