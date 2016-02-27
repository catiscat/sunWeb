<?php 
    require_once "lang.class.php";
    
    $lang = new Lang();
    $title="";
    
    
    
    public function setdiv5Lang($language){
        if($language=="zh"){
            $lang->setLangZh();
        }else if($language=="en"){
            $lang->setLangEn();
        }else{
            $lang->setLangDefault();
        }
    }
    

    public function div5(){
        
        if($lang->getLang()=="zh"){
            $title="推荐帖子";
        }else if($lang->getLang()=="en"){
            $title="Recommend";
        }
        return $title;
    }
    
?>
