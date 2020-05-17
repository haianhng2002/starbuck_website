<?php
include('functions.php');
$page_title = "Register Users";
include('header.php');
?>
<h1>User Registration</h1>
<form action="register.php" method="POST" class="form" style="width:50%;">
	<div class="form-group">
		<label for="first_name">First Name:</label> 
		<input type="text" name="first_name" class="form-control" id="first_name">
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" class="form-control" id="last_name">
	</div>
	<div class="form-group">
		<label for="email">Email Address:</label>
		<input type="text" name="email" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="password">Password:</label> <input type="password" name="password" id="password" class="form-control">
	</div>
	<p><input type="submit" value="Submit"></p>
</form>
<?php
include('footer.php');
?>