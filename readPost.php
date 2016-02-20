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
		
		  <li><a class='active' href='index.php'>Home</a></li>
		  <li><a href='blog.php'>Blog</a></li>
		  <li><a href='contact.php'>Contact</a></li>
		  <li><a href='about.php'>About</a></li>
		  
		</ul>
	</nav>
	<div class="div0">
    <div class="div1">
      <div class="div2">
        <?php 

            //该页面要显示指定博文的详细信息
            require_once './adminBlogSystem/PostService.class.php';
            
            $id=$_GET['id'];
            
            //查询数据库，调用sqlHelper  
            $postService=new PostService();
            $arr=$postService->getPostById($id);
        ?>
            
            <h2><?php echo $arr[0]['post_title'] ?></h2>
            <hr>
            作者：<?php echo $arr[0]['post_author'] ?><br><br>
            日期：<?php echo $arr[0]['post_date'] ?><br><br><br>
            <?php echo $arr[0]['post_content'] ?>
      </div>
      <div class="div3">
        <div class="div4">
     		<img class="bigduck" src="images/bigDuck.png" /><br>
			<a href="index.php"><h5>Duck的站点</h5></a>
			<a href="#"><h5>Duck的邮箱</h5></a>
			<a href="#github"><h5>Duck的收藏</h5></a>
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
