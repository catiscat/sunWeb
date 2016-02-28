<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/duck.ico" />
    <link rel='stylesheet' href='css/base.css' type='text/css'  />

    <title>DuckBlog</title>
  </head>
  <body>
	<?php require_once("headBar.php")?>
	<div class="div0">
    <div class="div1">
      <div class="div2">
        <div class='contentDiv'>
          <?php 
                  require_once (dirname(__FILE__)."/../../../includes/getArticleList.class.php");
                  echo "<h1>博文列表</h1>";
                  getLastTime();
                  echo "<hr>";  
                  for($i=0;$i<count($res2);$i++){
                      $row=$res2[$i];
                      echo "<table width='90%'>";
                      echo "<tr><td colspan='2'><h3><a href='readPost.php?id={$row['id']}'>{$row['post_title']}</h3></tr>";
                      echo "<tr><td width='50%'>{$row['post_date']}</td><td width='50%'>标签:{$row['post_type']}</td></tr>";
                  }
                  
                  echo "</table><br><br>";    
                  echo $rollPage->navigate;

	          ?>
		
	          <form action="blogList.php">
	              跳转到:<input type="text" name="pageNow" />
	              <input type="submit" value="GO" />
	              
	          </form> 
	           <br><br><br>
	
	    <?php require_once("footer.php")?>

		
		
	
      </div>
        </div>
 <!-require sideBar-->
        <div class="div3"><?php require_once("sideBar.php")?></div3>
        
    </div>





	</div>

  </body>
</html>
