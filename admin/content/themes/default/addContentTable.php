<?php 
   function addContent($title){
        echo "<!-dck-->
<form action='postProcess.php' method='post'>
    <table>		
        <tr><td>post_author</td><td><input type='text' wrap='physical' name='post_author' /></td></tr>
        <tr><td>post_date</td><td><input type='text' name='post_date' id='post_date' value='0' onclick='showTime(this)' /></td></tr>
        <tr><td>post_title</td><td><input type='text' wrap='physical' name='post_title' /></td></tr> 
        <tr><td>post_type</td><td><input type='text' name='post_type' /></td></tr> 
        <tr><td>post_summary</td><td><textarea wrap='physical' rows='10' cols='20' type='text' name='post_summary' ></textarea></td></tr>
        <tr><td>post_content</td><td><textarea wrap='physical' rows='30' cols='20' type='text' name='post_content' ></textarea></td></tr>


        <input type='hidden' name='flag' value='addpost' />
        <tr><td><input type='submit' value='$title' /></td><td><input type='reset' value='重新填写' /></td></tr>
    </table>
</form>
        ";
   }
?>




