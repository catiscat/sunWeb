<?php 
	
	function updatePostTable(){
	
	    echo "
    <form action='postProcess.php' method='post'>
        <table>
            <tr><td>ID</td><td><input readonly='readonly' type='text' name='id' value='<?php echo $arr[0]['id'] ?>' /></td></tr>        
            <tr><td>post_author</td><td><input type='text' name='post_author' value='<?php echo $arr[0]['post_author'] ?>' /></td></tr>
            <tr><td>post_date</td><td><input type='text' onclick='showTime(this)' name='post_date' value='<?php echo $arr[0]['post_date'] ?>' /></td></tr>
		    <tr><td>post_title</td><td><input type='text' name='post_title' value='<?php echo $arr[0]['post_title'] ?>' /></td></tr>
            <tr><td>post_type</td><td><input type='text' name='post_type' value='<?php echo $arr[0]['post_type'] ?>' /></td></tr>
            <tr><td>post_content</td><td><textarea type='text' rows='30' cols='50' name='post_content' value='<?php echo $arr[0]['post_content'] ?>' ></textarea></td></tr>         

            <input type='hidden' name='flag' value='updatepost' />
            <tr><td><input type='submit' value='修改博文' /></td><td><input type='reset' value='重新填写' /></td></tr>
        </table>
    </form>
            ";
    }
?>