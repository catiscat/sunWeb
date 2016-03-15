<?php
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(INCLUDES_PATH."checkSessionInfo.php");
    checkSessionInfo();

    require_once(THEMES_PATH."postList.php");
?>