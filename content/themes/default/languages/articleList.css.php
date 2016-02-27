<?php 
    require_once dirname(__FILE__)."/../../../../includes/lang.class.php";
    
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
