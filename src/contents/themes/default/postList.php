<!DOCTYPE html> 
<html>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(THEMES_PATH."/templates.php");


?>

<head>
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
        <?php require_once('sidebar.php'); ?>
       </div><!--close sidebar_container-->    




      <div class="slideshow">
           
            <?php showSlideshow(); ?>
            
      </div>
       
      <div id="content">
        <div class="content_item">
          <!--title-->
          <?php showBigTitle(); ?>
          <!--contents-->
         
          <?php   
            $pageNow = 1;
            $pageSize =10;
            if(!empty($_GET['pageNow'])){
                $temp=intval($_GET['pageNow']);
                if( $temp>=1 ){$pageNow=$temp;}else {$pageNow=1;}
            }
             showPostList(array("",$pageNow,$pageSize));
          ?>
          
         <?php
            $gotoUrl="postList.php";
            rollPage($pageNow,$gotoUrl);
         ?>
          
          <!--
          <!--recomand
          <div class="content_container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus tincidunt.</p>
              <div class="button_small">
              <a href="#">Read more</a>
            </div><!--close button_small-->
        <!--    
          </div><!--close content_container--
          <div class="content_container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus tincidunt.</p>          
              <div class="button_small">
              <a href="#">Read more</a>
            </div><!--close button_small--      
          </div><!--close content_container-->
          
        </div><!--close content_item-->
      </div><!--close content-->   
    </div><!--close site_content-->      

    <?php showFooter();?>
    
  </div><!--close main-->
  
  <!-- javascript at the bottom for fast page loading -->

</body>
</html>
