<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/duck.ico" >
    <link rel="stylesheet" href="styles/index.css" type="text/css"  >

    <title>DuckBlog</title>
  </head>
  <body>
	<nav>
		<ul>
		<?php
		  echo "<img class='duckIcon' src='images/duck.ico'/>";
		  echo "<li><a class='active' href='index.php'>Home</a></li>";
		  echo "<li><a href='blog.php'>Blog</a></li>";
		  echo "<li><a href='contact.php'>Contact</a></li>";
		  echo "<li><a href='about.php'>About</a></li>";
		  ?>
		</ul>
	</nav>
	<div class="div0">



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
