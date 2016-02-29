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
	
        require_once(dirname(__FILE__)."/../../includes/getArticleList.class.php");
 
        echo "<table border='1px' width='700px' bordercolor='green' cellspacing='0px'>";
        echo "<tr><th>id</th><th>post_author</th><th>post_date</th><th>post_summary</th><th>post_title</th><th>post_type</th><th>删除评论</th><th>修改评论</th></tr>";

        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['id']}</td><td>{$row['post_author']}</td><td>{$row['post_date']}</td><td>{$row['post_summary']}</td><td>{$row['post_title']}</td><td>{$row['post_type']}</td><td><a onclick='return confirmDel({$row['id']})' href='delPost.php?flag=del&id={$row['id']}'>删除评论</td><td><a href='updatePost.php?id={$row['id']}'>修改评论</td></tr>";
        }
        
        
        echo "<h1>评论信息列表</h1>";
        echo "</table>";


  
        //显示上一页和下一页
        echo $rollPage->navigate;

	?>
	<form action="commentManager.php">
	    跳转到:<input type="text" name="pageNow" />
	    <input type="submit" value="GO" />
	</form>
	
</html>
