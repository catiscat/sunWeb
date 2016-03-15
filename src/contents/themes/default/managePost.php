<!DOCTYPE html> 
<?php
        require_once($_SERVER['DOCUMENT_ROOT']."/load.php");
        require_once(INCLUDES_PATH."checkSessionInfo.php");
        checkSessionInfo();

        require_once(THEMES_PATH."/templates.php");


?>

<html>

<head>
<title>博文管理</title>
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
          <!--title-->
          <h1></h1>
          <!--contents-->
     

          
        <?php   
            $pageNow = 1;
            $pageSize =10;
            if(!empty($_GET['pageNow'])){
                $temp=intval($_GET['pageNow']);
                if( $temp>=1 ){$pageNow=$temp;}else {$pageNow=1;}
            }
            //showPost(listPostProfile(array("",$pageNow,$pageSize)));
            manageAllPosts((array("",$pageNow,$pageSize)));
            echo "<br><br>";
            
            $gotoUrl="managePost.php";
            rollPage($pageNow,$gotoUrl);
            echo "<br><br><hr><hr><br>";
            
            echo "<a href='manageAll.php' class='button_small_yellow' ><b>主界面</b></a>";
            echo "<br><br><hr><hr><br>";
            addPost();
          ?>

          
          <!--
          <div class="content_imagetext">
            <div class="content_image">
              <img src="images/image1.jpg" alt="image1"/>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi elit sapien, tempus sit amet hendrerit volutpat, euismod vitae risus. Etiam consequat, sem et vulputate dapibus, diam enim tristique est, vitae porta eros mauris ut orci. Praesent sed velit odio. Ut massa arcu, suscipit viverra molestie at, aliquet a metus. Nullam sit amet tellus dui, ut tincidunt justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis egestas laoreet. Nunc non ipsum metus, non laoreet urna. Vestibulum quis risus quis diam mattis tempus. Vestibulum suscipit pretium tempor. </p>
          </div><!--close content_imagetext-->
          
          
          
          <!--recomand--
          <div class="content_container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus tincidunt.</p>
              <div class="button_small">
              <a href="#">Read more</a>
            </div><!--close button_small--
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
  
  
</body>
</html>
