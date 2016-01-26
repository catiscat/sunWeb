<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/duckdog.ico" >
    <link rel="stylesheet" href="styles/index.css" type="text/css"  >

    <title>DuckBlog</title>
  </head>
  <body>
	<nav>
		<ul>
		<?php
		  echo "<li><a class='active' href='index.php'>Home</a></li>";
		  echo "<li><a href='blog.php'>Blog</a></li>";
		  echo "<li><a href='contact.php'>Contact</a></li>";
		  echo "<li><a href='about.php'>About</a></li>";
		  ?>
		</ul>
	</nav>
	<div class="div0">



	</div>
	<div>
		<a href='index.php'><img class='goTop' src='images/goTop.ico' /></a>
	</div>
       <footer>
            
              <i>DogDuck.lol 版权所有</i> &copy; 2016 - <?php echo date('Y'); ?>
               <p>转载请注明出处</p>            
        </footer>
  </body>
</html>
