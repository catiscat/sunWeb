<!DOCTYPE html>
<?php 
        require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
        require_once(THEMES_PATH."/templates.php");

?>
<html>

<head>
  <title>联系我</title>
  <?php showHead(); ?>
</head>

<body>
  <div id="main">

  <?php showHeader(); ?>   
    
    <div id="site_content">        
    
      <div id="strapline">
        <div id="welcome_slogan">
          <h3>Thinking and Sharing</h3>
        </div><!--close welcome_slogan-->
      </div><!--close strapline-->        

      <div class="sidebar_container">       
        <?php require_once("sidebar.php")?>
       </div><!--close sidebar_container-->    
       
      <div class="slideshow">
       <?php showSlideshow(); ?>
      </div>
    
      <div id="content">
        <div class="content_item">
          <div class="form_settings">
          <br><br>
                       <h1>Contact Duck</h1><hr><br><br>
            
            <h1>You can find me by</h1><br>
            <a href="mailto:duckHere@tutamail.com"><h1>@ Email</h1></a><h1>or</h1><br>
            <a href="https://github.com/catiscat"><h1>@ GitHub</h1></a><h1>or</h1><br>
            <a href="index.php"><h1>@ Site</h1></a><br><h1>And</h1>
            <h1>I Am Always Here Waiting for you :)</h1><br>
          </div><!--close form_settings-->
        </div><!--close content_item-->
      </div><!--close content-->   
    </div><!--close site_content-->      
      <?php showFooter();?>
  </div><!--close main-->


  
</body>
</html>
