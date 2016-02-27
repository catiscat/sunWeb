<?php 
    require_once "lang.class.php";
    
    


        function div5(){
            $title="";
            if(getLang()=="zh"){
                $title="推荐帖子";
            }else if(getLang()=="en"){
                $title="Recommend";
            }
            return $title;
        }

    
    
?>
