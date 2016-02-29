<?php 
	
	function updatePostTable($arr){
	
	    echo "
    <form action='../../../../includes/postProcess.php' method='post'>
        <table>
            <tr><td>ID</td><td><input readonly='readonly' type='text' name='id' value=".$arr[0]['id']." /></td></tr>        
            <tr><td>post_author</td><td><input type='text' name='post_author' value=" .$arr[0]['post_author']." /></td></tr>
            <tr><td>post_date</td><td><input type='text' onclick='showTime(this)' name='post_date' value=" .$arr[0]['post_date']." /></td></tr>
            <tr><td>post_content</td><td><textarea type='text' rows='30' cols='50' name='post_content' value=" .$arr[0]['post_content']." ></textarea></td></tr>         

            <input type='hidden' name='flag' value='updatecomment' />
            <input type='hidden' name='tableName' value='comments' />
            <tr><td><input type='submit' value='修改' /></td><td><input type='reset' value='重新填写' /></td></tr>
        </table>
    </form>
            ";
    }
?>
