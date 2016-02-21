<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>评论信息列表</title>
        <script type="text/javascript">
        <!-- 
        
        function confirmDel(val){
            
            return window.confirm("是否要删除id="+val+"的评论？");
        }
        
        
        -->
        </script>
    </head>
    
    <?php 

	require_once "CommentService.class.php";
	require_once "RollPage.class.php";

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
    
	
	
	//创建一个RollPage对象实例
	$rollPage=new RollPage();
	
	//给$rollPage指定必须的数据
	$rollPage->pageNow=1;
	$rollPage->pageSize=6;
	$rollPage->gotoUrl="commentList.php";
        
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


        //调用getCommentListByPage方法，获取应当显示的评论信息列表
        $res2=$commentService->getCommentListByPage($rollPage->pageNow,$rollPage->pageSize);
        echo "<table border='1px' width='700px' bordercolor='green' cellspacing='0px'>";
        echo "<tr><th>comment_id</th><th>comment_author</th><th>comment_date</th><th>comment_content</th><th>comment_post_id</th><th>comment_type</th><th>删除评论</th><th>修改评论</th><th>阅读评论</th></tr>";

        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['comment_id']}</td><td>{$row['comment_author']}</td><td>{$row['comment_date']}</td><td>{$row['comment_content']}</td><td>{$row['comment_post_id']}</td><td>{$row['comment_type']}</td><td><a onclick='return confirmDel({$row['comment_id']})' href='commentProcess.php?flag=del&id={$row['comment_id']}'>删除评论</td><td><a href='updateCommentUI.php?id={$row['comment_id']}'>修改评论</td><td><a href='readComment.php?id={$row['comment_id']}'>阅读评论</td></tr>";
        }
        
        
        echo "<h1>评论信息列表</h1>";
        echo "</table>";


  
        //显示上一页和下一页
        echo $rollPage->navigate;

/*        


	//指定跳转到某页	
	echo "<br/><br/>";
*/
	?>
	<form action="CommentList.php">
	    跳转到:<input type="text" name="pageNow" />
	    <input type="submit" value="GO" />
	</form>
	
</html>
