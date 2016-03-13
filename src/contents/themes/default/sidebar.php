<?php
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(THEMES_PATH."/templates.php");

?>
			<div class='sidebar'>
				<div class='sidebar_item'>
				  <h1>Recommend</h1>
					<span class='sidebar_font'>
					<?php  showPostByRecomand(array('',1,10)); ?>
					</span>
				</div><!--close sidebar_item--> 
			</div><!--close sidebar-->
	
			<div class='sidebar'>
				<div class='sidebar_item'>
				  <h1>Label</h1>
				<span class='sidebar_font'>
					<?php  showPostType(array('',1,30)); ?>
				</span>
				</div><!--close sidebar_item--> 
			</div><!--close sidebar-->
	<!--
			<div class='sidebar'>
				<div class='sidebar_item'>
				  <h3>November 2012</h3>
				  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim.</p>         
				</div><!--close sidebar_item--
			</div><!--close sidebar-->
	
			<div class='sidebar'>
				<div class='sidebar_item'>
				  <h2>Contact</h2>
				  <ul class='sidebar_font'>
				  <li>Email:<a href='mailto:duckHere@tutamail.com'>duckHere@tutamail.com</a></li>
				  <li>Github: <a href='https://github.com/catiscat'>catiscat</a></li>
				  <li>Site: <a href='https://duckdog.lol.com'>duckBlog</a></li>
				  </ul>
				</div><!--close sidebar_item-->
				 <?php  echo "   <br/>";  echo  switchTheme();?>
			</div><!--close sidebar-->	