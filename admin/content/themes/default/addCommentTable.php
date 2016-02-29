<?php 
    function addCommentTable($title){
        echo  "      
        <form action='userCommentProcess.php' method='post'>
            <table>
                <tr><td>您的大名</td><td><input wrap='physical' type='text' name='comment_author' /></td></tr>
                <tr><td>评论内容</td><td><textarea wrap='physical' rows='10' cols='25' type='text' name='comment_content' ></textarea></td></tr>
               <?php echo '<input type='hidden' name='comment_post_id' value=$id />'; ?>
                <input type='hidden' name='flag' value='addcomment' />
                <tr><td>验证码</td><td><input type='text' name='checkcode'></td><td><img src='checkCode.php' onclick='this.src='checkCode.php?aa='+Math.random()' /></td></tr>
                <tr><td><input type='submit' value='$title' /></td><td><input type='reset' value='重新填写' /></td></tr>
                
            </table><br><br><hr>
       </form>
            ";
        }

?>
