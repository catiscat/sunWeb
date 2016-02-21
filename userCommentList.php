<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>评论信息列表</title>
    </head>
    
    <?php 

	require_once "./adminBlogSystem/comment/CommentService.class.php";
	require_once "readPost.php";

	//创建了一个CommentService的对象实例
	$commentService=new CommentService();
    
        //调用getCommentListByPage方法，获取应当显示的评论信息列表
        $res2=$commentService->getUserCommentList($id);

        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['comment_id']}</td><td>{$row['comment_author']}</td><td>{$row['comment_date']}</td><td>{$row['comment_content']}</td><td>{$row['comment_post_id']}</td><td>{$row['comment_type']}</td><td><a onclick='return confirmDel({$row['comment_id']})' href='commentProcess.php?flag=del&id={$row['comment_id']}'>删除评论</td><td><a href='updateCommentUI.php?id={$row['comment_id']}'>修改评论</td><td><a href='readComment.php?id={$row['comment_id']}'>阅读评论</td></tr>";
        }
        echo "</table>";

	?>

	
</html>
