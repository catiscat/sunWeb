<!DOCTYPE html>
	
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
	require_once(THEMES_PATH."/templates.php");

?>
<html>
<head>
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

						   <h1>Contact Duck</h1><hr><br><br>
						   
						   <h1>You can find me by</h1><br>
						   <a href="mailto:duckHere@tutamail.com"><h1>@ Email</h1></a><h1>or</h1><br>
						   <a href="https://github.com/catiscat"><h1>@ GitHub</h1></a><h1>or</h1><br>
						   <a href="index.php"><h1>@ Site</h1></a><br><h1>And</h1>
						   <h1>I Am Always Here Waiting for you :)</h1><br>
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
