<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>博文列表</title>
        <script type="text/javascript">
        </script>
    </head>
    
    <?php 

	require_once "./adminBlogSystem/PostService.class.php";
	require_once "./adminBlogSystem/RollPage.class.php";

	//创建了一个PostService的对象实例
	$postService=new PostService();
    
	
	
	//创建一个RollPage对象实例
	$rollPage=new RollPage();
	
	//给$rollPage指定必须的数据
	$rollPage->pageNow=1;
	$rollPage->pageSize=6;
	$rollPage->gotoUrl="./adminBlogSystem/postList.php";
        
        //这里我们需要根据用户的点击来修改$pageNow的值。
        //这里我们需要判断 是否有$pageNow 发送，有就使用；如果没有，则默认为显示第一页
        if(!empty($_GET['pageNow'])){
            $rollPage->pageNow=$_GET['pageNow'];  
        }
        
	
        //$pageCount=0;//这个表一共有多少页，是计算出来的。
       
       
	    //调用了getRollPage($rollPage)方法，该方法可以把分页功能完成
	    $postService->getRollPage($rollPage);
	    
	    
	    //调用getPageCount方法，获取一共有多少页
	    $pageCount=$postService->getPageCount($rollPage->pageSize);        


        //调用getPostListByPage方法，获取应当显示的博文信息列表
        $res2=$postService->getPostListByPage($rollPage->pageNow,$rollPage->pageSize);
        echo "<table border='1px' width='700px' bordercolor='green' cellspacing='0px'>";
        echo "<tr><th>id</th><th>post_author</th><th>post_date</th><th>post_summary</th><th>post_title</th><th>post_type</th><th>阅读博文</th></tr>";

        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['id']}</td><td>{$row['post_author']}</td><td>{$row['post_date']}</td><td>{$row['post_summary']}</td><td>{$row['post_title']}</td><td>{$row['post_type']}</td><td><a href='./adminBlogSystem/readPost.php?id={$row['id']}'>阅读博文</td></tr>";
        }
        
        
        echo "<h1>博文信息列表</h1>";
        echo "</table>";


  
        //显示上一页和下一页
        echo $rollPage->navigate;

/*        


	//指定跳转到某页	
	echo "<br/><br/>";
*/
	?>
	<form action="./adminBlogSystem/postList.php">
	    跳转到:<input type="text" name="pageNow" />
	    <input type="submit" value="GO" />
	</form>
	
</html>

