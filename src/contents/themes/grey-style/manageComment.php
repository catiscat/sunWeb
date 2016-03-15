<!DOCTYPE html>
<html>
<?php
        require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
        require_once(INCLUDES_PATH."checkSessionInfo.php");
        checkSessionInfo();

        require_once(THEMES_PATH."/templates.php");


?>

<head>
  <title>评论管理</title>
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
                            $pageNow = 1;
                            $pageSize =10;
                            if(!empty($_GET['pageNow'])){
                                $temp=intval($_GET['pageNow']);
                                if( $temp>=1 ){$pageNow=$temp;}else {$pageNow=1;}
                            }
                            
                            manageAllComments((array("",$pageNow,$pageSize)));
                            echo "<br><br>";
                            
                            $gotoUrl="manageComment.php";
                            rollPage($pageNow,$gotoUrl);
                            echo "<br><br><hr><hr><br><br>";
                            echo "<a href='manageAll.php' class='button_small_yellow' ><b>主界面</b></a>";
                            
                            
                            
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
