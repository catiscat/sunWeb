<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
            function showTime(){               
                document.getElementById("comment_date").value = new Date().toLocaleString();
            }
        </script>
    </head>
    <h1>添加博文</h1>
    <form action="commentProcess.php" method="post">
        <table>
            <tr><td>comment_author</td><td><input type="text" name="comment_author" /></td></tr>
            <tr><td>comment_date</td><td><input type="text" name="comment_date" id="comment_date" value='0' onclick="showTime(this)" /></td></tr>
	        <tr><td>comment_post_id</td><td><input type="text" name="comment_post_id" /></td></tr> 
            <tr><td>comment_type</td><td><input type="text" name="comment_type" /></td></tr> 
            <tr><td>comment_content</td><td><textarea rows="30" cols="20" type="text" name="comment_content" ></textarea></td></tr>


            <input type="hidden" name="flag" value="addcomment" />
            <tr><td><input type="submit" value="添加博文" /></td><td><input type="reset" value="重新填写" /></td></tr>
        </table>
    </form>
</html>


