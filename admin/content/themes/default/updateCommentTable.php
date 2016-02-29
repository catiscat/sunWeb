<?php 
	
	function updatePostTable($arr){
	
	    echo "
    <form action='../../../../includes/postProcess.php' method='post'>
        <table>
		    <tr><td>comment_id</td><td><input type='hidden' name='id' value=" .$arr[0]['comment_id']." /></td></tr>  
            <tr><td>post_author</td><td><input type='text' name='post_author' value=" .$arr[0]['comment_author']." /></td></tr>
            <tr><td>post_date</td><td><input type='text' name='post_date' value=" .$arr[0]['comment_date']." /></td></tr>
            <tr><td>post_content</td><td><textarea type='text' rows='30' cols='50' name='post_content' value=" .$arr[0]['comment_content']." ></textarea></td></tr>         
            <input type='hidden' name='flag' value='updatecomment' />
            <input type='hidden' name='tableName' value='comments' />
            <tr><td><input type='submit' value='修改' /></td><td><input type='reset' value='重新填写' /></td></tr>
        </table>
    </form>
            ";
    }
?>
