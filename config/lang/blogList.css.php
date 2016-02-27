<?php 
    require_once "./lang.class.php";
    
 
        $lan = new Langu();


        function div5(){
            $title="";
            if($lan->getLang()=="zh"){
                $title="推荐帖子";
            }else if($lan->getLang()=="en"){
                $title="Recommend";
            }
            return $title;
        }

    
    
?>
