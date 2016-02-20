<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>
    <h1>添加博文</h1>
    <form action="postProcess.php" method="post">
        <table>
            <tr><td>post_author</td><td><input type="text" name="post_author" /></td></tr>
            <tr><td>post_date</td><td><input type="text" name="post_date" /></td></tr>
            <tr><td>post_content</td><td><input type="text" name="post_content" /></td></tr>
            <tr><td>post_title</td><td><input type="text" name="post_title" /></td></tr> 
            <tr><td>post_type</td><td><input type="text" name="post_type" /></td></tr> 

            <input type="hidden" name="flag" value="addpost" />
            <tr><td><input type="submit" value="添加博文" /></td><td><input type="reset" value="重新填写" /></td></tr>
        </table>
    </form>
</html>
