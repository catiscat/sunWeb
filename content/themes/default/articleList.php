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

	          require_once dirname(__FILE__)."/../../../includes/PostService.class.php";
	          require_once dirname(__FILE__)."/../../../includes/RollPage.class.php";
              	  require_once dirname(__FILE__)."/../../../includes/commen.php";
	          //创建了一个PostService的对象实例
	          $postService=new PostService();
              date_default_timezone_set('PRC');
              //创建一个sqlHelper对象实例，用于让 mysql_real_escape_string()函数得到现在的连接。
              $sqlHelper=new SqlHelper();
	
	
	          //创建一个RollPage对象实例
	          $rollPage=new RollPage();
	
	          //给$rollPage指定必须的数据
	          $rollPage->pageNow=1;
	          $rollPage->pageSize=15;
	          $rollPage->gotoUrl="blogList.php";
                  
                  	
                  //$pageCount=0;//这个表一共有多少页，是计算出来的。
                 
                 
	              //调用了getRollPage($rollPage)方法，该方法可以把分页功能完成
	              $postService->getRollPage($rollPage);
	              
	              
	              //调用getPageCount方法，获取一共有多少页
	              $pageCount=$postService->getPageCount($rollPage->pageSize); 
                  
                  
                  //这里我们需要根据用户的点击来修改$pageNow的值。
                  //这里我们需要判断 是否有$pageNow 发送，有就使用；如果没有，则默认为显示第一页
                  if(!empty($_GET['pageNow'])){
                      $id=intval(mysql_real_escape_string(strip_tags($_GET['pageNow'])));
                      if(!empty($id)){
            	        if($id>$pageCount){
			                header("Location:index.php"); //文章id大于总页数，将用户送回Homepage。
		                    exit();
            	         }           
                  }else{
                    header("Location:index.php"); //文章id为空不合法，将用户送回Homepage。
		            exit();
                  }
                      $rollPage->pageNow=$id;  
                  }
                  
       


                  //调用getPostListByPage方法，获取应当显示的博文信息列表
                  $res2=$postService->getPostListByPage($rollPage->pageNow,$rollPage->pageSize);
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
