<?php
       // $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
        
        
        if(!empty($_SERVER['HTTPS'])){
                define("PROTOCOL","https://");
        }else{
                define("PROTOCOL","http://");
        }
        define("SERVER_NAME",$_SERVER['SERVER_NAME']);
        define("ROOT_PATH",$_SERVER['DOCUMENT_ROOT']);
        define("ROOT_URL",PROTOCOL.SERVER_NAME."/");
        //define("SELF_PATH",$_SERVER['PHP_SELF']);
        
        //define("THEME","grey-style/");
        
        session_start();
        if(!empty($_SESSION['themePath'])){
                define("THEME",$_SESSION['themePath']);
        }else{
                define("THEME","default/");
        }
        
        
        define("USER","admin/");
        define("USER_MANAGER",USER."manager/");
        define("USER_MANAGER_URL",ROOT_URL.USER."manager/");
        
        
        define("DRIVERS","drivers/");
        define("SQL","MySql/");
        
        define("CRUD_TOOL","crud/");
        define("ADMIN_CRUD_TOOL","admin/");
        define("COMMRNT_CRUD_TOOL","comment/");
        define("POST_CRUD_TOOL","post/");
        
        
            

        
        define("THEMES_URL",PROTOCOL.SERVER_NAME."/contents/themes/".THEME);
        define("THEMES_PATH",ROOT_PATH."/contents/themes/".THEME);
        define("THEMES_PATH_SELF","/contents/themes/".THEME);
        
        define("INCLUDES_URL",PROTOCOL.SERVER_NAME."/includes/");
        define("INCLUDES_PATH",ROOT_PATH."/includes/");
        define("INCLUDES_PATH_SELF","/includes/");
        
        define("UTILS_URL",PROTOCOL.SERVER_NAME."/utils/");
        define("UTILS_PATH",ROOT_PATH."/utils/");
        define("UTILS_PATH_SELF","/utils/");
        
        
        define("SQL_HELPER_PATH",INCLUDES_PATH.DRIVERS.SQL);
        define("CRUD_TOOL_PATH",UTILS_PATH.CRUD_TOOL);
        
        define("ADMIN_CRUD_TOOL_PATH",UTILS_PATH.ADMIN_CRUD_TOOL);
        define("COMMRNT_CRUD_TOOL_PATH",UTILS_PATH.COMMRNT_CRUD_TOOL);
        define("POST_CRUD_TOOL_PATH",UTILS_PATH.POST_CRUD_TOOL);
        
        define("ADMIN_CRUD_TOOL_PATH_SELF",UTILS_PATH_SELF.ADMIN_CRUD_TOOL);
        define("COMMRNT_CRUD_TOOL_PATH_SELF",UTILS_PATH_SELF.COMMRNT_CRUD_TOOL);
        define("POST_CRUD_TOOL_PATH_SELF",UTILS_PATH_SELF.POST_CRUD_TOOL);
        
        define("CONFIG_PATH",ROOT_PATH."/config/");
        
        

        

        
 ?>
