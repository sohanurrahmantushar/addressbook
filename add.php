<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	//$qty = $_POST['qty'];
	//$price = $_POST['price'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	//if(empty($name) || empty($qty) || empty($price)) {
	if(empty($name) || empty($phone) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		//if(empty($qty)) {
			//echo "<font color='red'>Quantity field is empty.</font><br/>";
		//}
		
		//if(empty($price)) {
			//echo "<font color='red'>Price field is empty.</font><br/>";
		//}
		if(empty($phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		//$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");
		
        $result = mysqli_query($mysqli, "INSERT INTO address(name,phone , email, login_id) VALUES('$name','$phone','$email', '$loginId')");
         echo "<br><br><br/>";
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
