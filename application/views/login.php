<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
	</style>

<p>Admin login</p>

<form role="form" method="post" action="<?php echo base_url('/index.php/main/login_user'); ?>">
  <label for="uname">Username:</label>
  <input type="text" id="uname" name="uname"><br><br>
  <label for="pwd">Password:</label>
  <input type="password" id="pwd" name="pwd"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>