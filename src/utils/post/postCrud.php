<?php
    echo "<meta charset='utf-8'/>";
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once (CRUD_TOOL_PATH."PostCRUD.class.php");
    require_once(INCLUDES_PATH."checkSessionInfo.php");
    checkSessionInfo();
?>

<?php
    
    $postCRDU = new PostCRUD();
    $postCRDU->construct();
    
    $returnPath = USER_MANAGER_URL."managePost.php";
    if ($postCRDU->getRes()!=0)  {header("Location:$returnPath");
    }else {echo "操作失败";}

?>
