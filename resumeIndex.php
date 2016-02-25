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
	      
	      <h3>联系方式</h3>
	      <p>手机：RR</p><br>
	      <p>邮箱：WGRGWTR</p><br>
	      <p>微信号：WGRGWTR</p><br><hr>
	      
	      
	      <h3>个人信息</h3>
	      <p>Duck/女/1999</p><br>
	      <p>211/西南大学心理学系</p><br>
	      <p>英语六级已过，托福裸考78分</p><br>
	      <p>技术博客</p><br>
	      <p>Github</p><br>
	      <p>期望职位</p><br>
	      <p>期望城市</p><br><hr>
	      
	      <h3>开源项目与作品</h3>
	      <p>开源项目</p><br>
	      <p>项目链接1</p><br>
	      <p>项目2</p><br>
	      <p>项目3</p><br>
	      <p>技术文章</p><br>
	      <p>文章链接1翻译或原创</p>
	      <p>期望城市</p><br><hr>
	      
	      <h3>技能清单</h3>
	      <p>掌握的语言</p><br>
	      <p>使用的工具</p><br>
	      <p>使用的开发环境</p><br><br><br>

	      
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