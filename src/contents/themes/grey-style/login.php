<!DOCTYPE html>
<html>
<?php 
    

    require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
    require_once(THEMES_PATH."templates.php");

    
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    

    
?>
    <head>
            <title>管理员登陆</title>
            <?php showHead(); ?>
    </head>
    <body>   
        <div id="wrap">
                    
            <div id="logo">
                <h1><a href="#">duckBlog</a></h1>                
            </div>
            <div id="content_bg">
                <div id="header">
                
                  <div id="wrapper">
            <div id="slider-wrapper">        
                <?php showSlideshow(); ?>      
            </div>

            </div>        
                </div>                
                <div id="menu">
                    <?php showHeader(); ?>
                    <div class="clear"></div>
                </div>
                <div id="content_white">
                    
                    <div id="content">
                    <div id="content_left">
                    <h2> Duck Blog</h2>
                    
                    <!--center content-->

         
                      <?php
                        showLoginInfo();
                     ?>
                       
                   <!--end----center content-->
             
                </div>
                <!--sidebar-->

                <?php require_once('sidebar.php'); ?>

                <!-- end sidebar-->
                <div class="clear"></div>
            </div>
                    
                </div>
                
                
            </div>
        </div>
        
        <!--footer start -->
            <?php showFooter();?>
        <!--footer end -->
    </body>
</html>
