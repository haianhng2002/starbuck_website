

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		require('mysqli_connect.php');// Connect to the db

		$name = mysqli_real_escape_string($dbc, $_POST['teaName']);
		
		$size = mysqli_real_escape_string($dbc, $_POST['sizeName']);

		$add = mysqli_real_escape_string($dbc, $_POST['addIn']);

		$top = mysqli_real_escape_string($dbc, $_POST['Toppings']);

		$fla = mysqli_real_escape_string($dbc, $_POST['Flavors']);

		$cup = mysqli_real_escape_string($dbc, $_POST['CupOptions']);

		$tea = mysqli_real_escape_string($dbc, $_POST['Teas']);

		$price = $_POST['Price'];

		$query = "INSERT INTO cart (product_id,teaName, sizeName, addIn, Toppings, Flavors,CupOptions, Teas,Price)VALUES(NULL,'$name','$size','$add','$top','$fla','$cup','$tea','$price')";
			
		$run = mysqli_query($dbc, $query); //Run the query

		mysqli_close($dbc);//Close the db connection
	}
?>