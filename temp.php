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
		  <li><a href='index.php'>Home</a></li>  
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

            header("content-type:text/html;charset=utf-8");
            echo "对不起你评论失败<br/>";
            echo "<a href='blogList.php'>返回继续阅读</a>";
        ?>
	           <br><br><br>
	
	    <div class='goTopDiv'>
		<a href='ok.php#'><img class='goTop' src='images/goTop.ico' /></a>
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
     		<img class="bigduck" src="images/bigDuck.png" /><br>
			<a href="index.php"><h5>Duck's Site</h5></a>
			<a href="contact.php"><h5>Duck's Email</h5></a>
			<a href="https://github.com/catiscat"><h5>Duck's GitHub</h5></a>
			<h3>订阅DuckBlog</h3>
			<a href="#feed"><img class="feed" src="images/feed.ico" /></a>
        </div><hr>
        <div class="div5">
			<h3>推荐帖子</h3>
        
        </div><hr>
        <div class="div6">
        	<h3>分类标签</h3>
        </div><hr>
      </div>
    </div>





	</div>

  </body>
</html>
