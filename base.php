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
		<?php
		  echo "<li><a href='index.php'><img class='duckIcon' src='images/duck.ico'/></a></li>";
		  echo "<li><a class='active' href='index.php'>Home</a></li>";
		  echo "<li><a href='blog.php'>Blog</a></li>";
		  echo "<li><a href='contact.php'>Contact</a></li>";
		  echo "<li><a href='about.php'>About</a></li>";
		  ?>
		</ul>
	</nav>
	<div class="div0">
    <div class="div1">
      <div class="div2">
        
      </div>
      <div class="div3">
        <div class="div4">
     		<img class="bigduck" src="images/bigDuck.ico" />
			<a href="">Duck的站点</a><br>
			<a href="#">Duck的邮箱</a><br>
			<a href="#github">Duck的收藏</a><br>
			<h3>订阅DuckBlog</h3>
			<a href="#feed"><img class="feed" src="images/feed.ico" /></a>
        </div>
        <div class="div5">
			<h3>推荐帖子</h3>
        
        </div>
        <div class="div6">
        	<h3>分类标签</h3>
        </div>
      </div>
    </div>


	</div>
	<div class='goTopDiv'>
		<a href='index.php'><img class='goTop' src='images/goTop.ico' /></a>
	</div>
	<div class="footerDiv">
       <footer>
            
              <i>DogDuck.lol 版权所有</i> &copy; 2016 - <?php echo date('Y'); ?>
               <p>转载请注明出处</p>            
        </footer>
	</div>
  </body>
</html>
