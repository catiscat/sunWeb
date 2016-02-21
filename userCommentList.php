    <?php 
	require_once "./adminBlogSystem/comment/CommentService.class.php";	
	require_once "./adminBlogSystem/comment/RollPage.class.php";
	

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
    
	
	
	//创建一个RollPage对象实例
	$rollPage=new RollPage();
	
	//给$rollPage指定必须的数据
	$rollPage->pageNow=1;
	$rollPage->pageSize=600000000000000000;
	$rollPage->gotoUrl="userCommentList.php";
        
        //这里我们需要根据用户的点击来修改$pageNow的值。
        //这里我们需要判断 是否有$pageNow 发送，有就使用；如果没有，则默认为显示第一页
        if(!empty($_GET['pageNow'])){
            $rollPage->pageNow=$_GET['pageNow'];  
        }
        
	
        //$pageCount=0;//这个表一共有多少页，是计算出来的。
       
       
	    //调用了getRollPage($rollPage)方法，该方法可以把分页功能完成
	    $commentService->getRollPage($rollPage);
	    
	    
	    //调用getPageCount方法，获取一共有多少页
	    $pageCount=$commentService->getPageCount($rollPage->pageSize);        

/*
        //调用getCommentListByPage方法，获取应当显示的评论信息列表
        $res2=$commentService->getCommentListByPage($rollPage->pageNow,$rollPage->pageSize);
        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<table>";
            echo "<tr><td width='50%'>{$row['comment_author']}说：</td><td width='50%'>{$row['comment_date']}</td></tr></table>";
            echo "<br>{$row['comment_content']}";
            echo "<br><hr>";
		}
        echo "<br><br><br>";
  */      
        
        //调用getCommentListByPage方法，获取当前文章对应的评论信息列表
        $res=$commentService->getUserCommentList($id);
            for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            echo "<table>";
            echo "<tr><td width='50%'>{$row['comment_author']}说：</td><td width='50%'>{$row['comment_date']}</td></tr></table>";
            echo "<br>{$row['comment_content']}";
            echo "<br><hr>";
		}
        echo "<br><br><br>";
	?>
	

