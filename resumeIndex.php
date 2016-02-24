<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/duck.ico" >
    <link rel="stylesheet" href="styles/base.css" type="text/css"  >

    <title>DuckBlog</title>
  </head>
  <body>
	<nav>
		<ul>
		  <li><a href='index.php#'>Home</a></li>  
		  <li><a href='blogList.php'>Blog</a></li>
		  <li><a href='contact.php'>Contact</a></li>
		  <li><a href='about.php'>About</a></li>
		  
		</ul>
	</nav>
	<div class="div0">
    <div class="div1">
      <div class="div2">
        <div class='contentDiv'>
          <?php 


            require_once 'commen.php';
            echo "<h1>个人简历</h1>";
            getLastTime();
            echo "<hr>";  
	      ?>
	
	    <div class='goTopDiv'>
		<a href='index.php#'><img class='goTop' src='images/goTop.ico' /></a>
		</div>
	    <div class="footerDiv">
       <footer>
             
              <i>DogDuck.lol 版权所有</i> &copy; 2016 - <?php echo date('Y'); ?>
               <p>转载请注明出处</p>            
        </footer>

	</div>

		
		
	
      </div>
        </div>
      <div class="div3">
        <div class="div4">
     		<a href="index.php"><img class="bigduck" src="images/bigDuck.png" /></a><br>
			<a href="index.php"><h5>Duck's Site</h5></a>
			<a href="contact.php"><h5>Duck's Email</h5></a>
			<a href="https://github.com/catiscat"><h5>Duck's GitHub</h5></a>
			<h3>订阅DuckBlog</h3>
			<a href="#feed"><img class="feed" src="images/feed.ico" /></a>
        </div><hr>
        <div class="div5">
			<h3>推荐帖子</h3>
			<?php 
			    for($i=0;$i<count($res2);$i++){
                    $row=$res2[$i];                    
                    echo "<a href='readPost.php?id={$row['id']}'>{$row['post_title']}</a><br><br>";
                }
                  
            ?>
        
        </div><hr>
        <div class="div6">
        	<h3>分类标签</h3>
        	<a href='#'>> IT</a><br><br>
        	<a href='#'>> 编程</a><br><br>
        	<a href='#'>> 心理学</a><br><br>
		    <a href='#'>> 随感</a><br><br>
        	<a href='#'>> 职场</a><br><br>
        	<a href='#'>> 转载</a><br><br>
        </div><br><br><br>
      </div>
    </div>





	</div>

  </body>
</html>
