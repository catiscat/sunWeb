<!DOCTYPE html>
<html>
<?php 
	    require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
        require_once(THEMES_PATH."/templates.php");
		require_once(INCLUDES_PATH."checkSessionInfo.php");
		checkSessionInfo();
?>
    <head>
		  <title>后台管理</title>
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

         
				<br><br><br>
		
				<a href='managePost.php' class='button_small_yellow'  >博文管理</a><br><br>
				<a href='manageComment.php' class='button_small_yellow' >评论管理</a>

				</div>	   
                   <!--end----center content-->
             
                </div>
				<!--sidebar-->


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
