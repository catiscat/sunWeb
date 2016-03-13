<?php
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(THEMES_PATH."/templates.php");

?>
	          <div id="content_right">
                	<h2>Recommend</h2>
					
					<!--sidebar one-->
                	<div class="content_right_pad">
                    	<div class="news">
                        	<!--sidebar content one-->
                            <?php  showPostByRecomand(array('',1,10)); ?>
                        
                           <!--end sidebar content one-->
                            <div class="clear"></div>
                        </div>
                    </div>
					<!--end sidebar one-->
					
                    <div class="bor_goriz"></div>
					
					<!--sidebar two-->
                    <div class="content_right_pad">
                    	<div class="news">
							<h2>Type</h2>
                        	<!--sidebar content two-->
                      
                        <?php  showPostType(array('',1,30)); ?>
					
                           <!--end sidebar content two-->
                       
                            <div class="clear"></div>
                        </div>
                    </div>
					<!--end sidebar two-->
					
                    <!--sidebar three-->
					<hr>
                	<div class="content_right_pad">
                    	<div class="news">
                        	<!--sidebar content three-->
                            <h2>Contact</h2><br><br>
                            <ul class='left_sidebar'>
                                <li><a href='mailto:duckHere@tutamail.com'>Email:duckHere@tutamail.com</a></li><br>
                                <li><a href='https://github.com/catiscat'>Github:catiscat</a></li><br>
                                <li><a href='https://duckdog.lol.com'>Site:duckBlog</a></li><br>
                            </ul>
                        
                           <!--end sidebar content three-->
                            <div class="clear"></div>
                        </div>
                    </div>
					<!--end sidebar three-->
                    <?php  echo "<hr> <br/>";  echo  switchTheme();?>
                </div>
              
              
              
