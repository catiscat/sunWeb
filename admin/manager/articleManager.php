<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>博文信息列表</title>
        <script type="text/javascript">
        <!-- 
        
        function confirmDel(val){
            
            return window.confirm("是否要删除id="+val+"的博文？");
        }
        
        
        -->
        </script>
    </head>
    
    <?php 
	
        require_once(dirname(__FILE__)."/../includes/getArticleList.class.php");
 
        echo "<table border='1px' width='700px' bordercolor='green' cellspacing='0px'>";
        echo "<tr><th>id</th><th>post_author</th><th>post_date</th><th>post_summary</th><th>post_title</th><th>post_type</th><th>删除博文</th><th>修改博文</th><th>阅读博文</th></tr>";

        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['id']}</td><td>{$row['post_author']}</td><td>{$row['post_date']}</td><td>{$row['post_summary']}</td><td>{$row['post_title']}</td><td>{$row['post_type']}</td><td><a onclick='return confirmDel({$row['id']})' href='postProcess.php?flag=del&id={$row['id']}'>删除博文</td><td><a href='updatePost.php?id={$row['id']}'>修改博文</td><td><a href='readPost.php?id={$row['id']}'>阅读博文</td></tr>";
        }
        
        
        echo "<h1>博文信息列表</h1>";
        echo "</table>";


  
        //显示上一页和下一页
        echo $rollPage->navigate;

	?>
	<form action="postList.php">
	    跳转到:<input type="text" name="pageNow" />
	    <input type="submit" value="GO" />
	</form>
	
</html>
