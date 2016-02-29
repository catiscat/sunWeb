<?php 

	echo "<meta charset='utf-8' />";
    function addCommentTable($title){
        echo  "      
        <form action='../../../../includes/postProcess.php' method='post'>
            <table>
                <tr><td>您的大名</td><td><input wrap='physical' type='text' name='comment_author' /></td></tr>
                <tr><td>评论时间</td><td><input wrap='physical' type='readonly' name='comment_date' value=time() /></td></tr>
                <tr><td>评论内容</td><td><textarea wrap='physical' rows='10' cols='25' type='text' name='comment_content' ></textarea></td></tr>
                <input type='hidden' name='flag' value='addcomment' />
		<input type='hidden' name='tableName' value='comments' />
                <tr><td>验证码</td><td><input type='text' name='checkcode'></td><td><img src='../../../includes/checkCode.php' onclick=this.src='../../../includes/checkCode.php?aa='+Math.random() /></td></tr>
                <tr><td><input type='submit' value=$title /></td><td><input type='reset' value='重新填写' /></td></tr>
                
            </table><br><br><hr>
       </form>
            ";
        }

?>
