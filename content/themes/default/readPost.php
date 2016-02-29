<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	
    <link rel="shortcut icon" href="images/duck.ico" >
    <link rel="stylesheet" href="css/base.css" type="text/css"  >

    <title>DuckBlog</title>
  </head>
  <body>
	<nav>
		<ul>
		  <li><a href='index.php'>Home</a></li>  
		  <li><a href='index.php'>Blog</a></li>
		  <li><a href='contact.php'>Contact</a></li>
		  <li><a href='about.php'>About</a></li>
		  
		</ul>
	</nav>
	<div class="div0">
    <div class="div1">
      <div class="div2">
        <div class='contentDiv'>
        <?php 

            //该页面要显示指定博文的详细信息
            require_once dirname(__FILE__).'/../../../includes/PostService.class.php';

          
            $postService=new PostService("posts");
     //       $pageCount=$_REQUIRE['pageCount']
            
            //创建一个sqlHelper对象实例，用于让 mysql_real_escape_string()函数得到现在的连接。
            $sqlHelper=new SqlHelper();
            //注意：对得到的任何来自页面的输入$_GET[];$_POST[]，都要进行过滤，不给sql注入漏洞留下任何契机。
            $id=intval(mysql_real_escape_string(strip_tags($_GET['id'])));
            
            if(!empty($id)){
            	if($id>100000){
			        header("Location:index.php"); //文章id过大不合法，将用户送回Homepage。
		            exit();
            	}           
            }else{
                    header("Location:index.php"); //文章id为空不合法，将用户送回Homepage。
		            exit();
            }
            
       

            

            $arr=$postService->getPostById($id);
            

        ?>
            
            <?php 
                    if(!empty($arr[0])){//这里是为了防止用户从地址栏中sql注入漏洞
                        
                        echo "<h2>".$arr[0]['post_title']."</h2><hr>";
                        echo $arr[0]['post_author']."<br><br>";
                        echo $arr[0]['post_date']."<br><br>";
                        echo $arr[0]['post_content']."<br><br><hr><br><br>";
                    }else{
                        header("Location:index.php");
                        exit();
                    }
             ?>

		    <!--显示添加评论-->
		    
		    <h3>添加评论</h3>
		    <?php
		    require_once dirname(__FILE__)."/../../../admin/manager/addComment.php";
            ?>    
            <!--显示所有关于该文章的评论-->
            <br></br><h3>所有评论</h3><br><hr>
            <?php 
                require_once "userCommentList.php";
            ?>
	        
	        	<div class='goTopDiv'>
		        <?php echo "<a href='readPost.php?id={$id}#'>";?><img class='goTop' src='images/goTop.ico' /></a>
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
        <?php require_once("sideBar.php")?>
      </div>
    </div>


	</div>

  </body>
</html>
