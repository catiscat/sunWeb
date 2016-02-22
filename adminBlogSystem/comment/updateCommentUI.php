<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
            function showTime(){               
                document.getElementById("comment_date").value = new Date().toLocaleString();
            }
        </script>
    </head>
    <?php 

    //该页面要显示准备修改的评论信息
    
    require_once 'CommentService.class.php';
    $sqlHelper=new SqlHelper();


    $id=mysql_real_escape_string(strip_tags($_GET['id']));
    //通过id得到该评论的其他信息
    //查询数据库，调用sqlHelper
    
    $commentService=new CommentService();
    $arr=$commentService->getCommentById($id);
    
    ?>
    
    
    <h1>修改评论</h1>
    <form action="commentProcess.php" method="post">
        <table>
            <tr><td>ID</td><td><input readonly="readonly" type="text" name="comment_id" value="<?php echo $arr[0]['comment_id'] ?>" /></td></tr>        
            <tr><td>comment_author</td><td><input type="text" name="comment_author" value="<?php echo $arr[0]['comment_author'] ?>" /></td></tr>
            <tr><td>comment_date</td><td><input type="text" onclick="showTime(this)" name="comment_date" value="<?php echo $arr[0]['comment_date'] ?>" /></td></tr>
		    <tr><td>comment_post_id</td><td><input type="text" name="comment_post_id" value="<?php echo $arr[0]['comment_post_id'] ?>" /></td></tr>
            <tr><td>comment_type</td><td><input type="text" name="comment_type" value="<?php echo $arr[0]['comment_type'] ?>" /></td></tr>
            <tr><td>comment_content</td><td><textarea type="text" rows="30" cols="50" name="comment_content" value="<?php echo $arr[0]['comment_content'] ?>" ></textarea></td></tr>         

            <input type="hidden" name="flag" value="updatecomment" />
            <tr><td><input type="submit" value="修改评论" /></td><td><input type="reset" value="重新填写" /></td></tr>
        </table>
    </form>
</html>
