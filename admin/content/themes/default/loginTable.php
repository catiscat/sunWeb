
<?php 
function loginTable($username,$password,$checkcode,$buttonLeft,$buttonRight){
 echo "

<form action='loginProcess.php' method='post'>
	<table>
		<tr><td>$username</td><td><input type='text' name='id'></td></tr>
		<tr><td>$password</td><td><input type='password' name='password'></td></tr>
        <tr><td>$checkcode</td><td><input type='text' name='checkcode'></td><td><img src='checkCode.php' onclick='this.src='checkCode.php?aa='+Math.random()' /></td></tr>
		<tr><td><input type='submit' value=$buttonLeft/></td><td><input type='reset' value=$buttonRight /></td></tr>
	</table>
</form>
    "
}
   
?>

