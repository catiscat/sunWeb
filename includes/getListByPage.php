<?php

	          require_once "PostService.class.php";
	          require_once "RollPage.class.php";              
              require_once "commen.php";
	          //创建了一个PostService的对象实例
	          $postService=new PostService($tableName);
              date_default_timezone_set('PRC');
              //创建一个sqlHelper对象实例，用于让 mysql_real_escape_string()函数得到现在的连接。
              $sqlHelper=new SqlHelper();
	
	
	          //创建一个RollPage对象实例
	          $rollPage=new RollPage();
	
	          //给$rollPage指定必须的数据
	          $rollPage->pageNow=1;
	          $rollPage->pageSize=15;
	          $rollPage->gotoUrl=$gotoUrl;
                  
                  	
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

?>
