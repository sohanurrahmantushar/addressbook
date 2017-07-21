<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	//$qty = $_POST['qty'];
	//$price = $_POST['price'];	
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	// checking empty fields
	//if(empty($name) || empty($qty) || empty($price)) {
				
		//if(empty($name)) {
			//echo "<font color='red'>Name field is empty.</font><br/>";
		//}
		
		//if(empty($qty)) {
			//echo "<font color='red'>Quantity field is empty.</font><br/>";
		//}
		
		//if(empty($price)) {
			//echo "<font color='red'>Price field is empty.</font><br/>";
		//}	

		if(empty($name) || empty($phone) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		
		if(empty($phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}	
	}
	 else {	
		//updating the table
		//$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		$result = mysqli_query($mysqli, "UPDATE address SET name='$name', phone='$phone', email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}

?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
$result = mysqli_query($mysqli, "SELECT * FROM address WHERE id=$id");
while($res = mysqli_fetch_array($result))
/*{
	$name = $res['name'];
	$qty = $res['qty'];
	$price = $res['price'];
}*/
{
	$name = $res['name'];
	$phone = $res['phone'];
	$email = $res['email'];
}
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- css links -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">
    <!-- javascript links -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Edit Data</title>
</head>

<body>

     <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<!--<li>
				<a href="logout.php" name="logout" >Logout</a>
			</li>-->
           <a class='navbar-brand page-scroll' href="index.php">Online Addressbook</a> 
        </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="register.php">Registration</a>
                </li>
                <li>
                    <a class="page-scroll" href="login.php">Login</a>
                </li>
                <li>
                    <a class="page-scroll" href="logout.php">Logout</a>
                </li>
               
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
	
	
	<form name="form1" method="post" action="edit.php">
	<br><br><br><br><br/>
	<a href="index.php">Home</a> | <a href="view.php">View address</a> | <a href="logout.php">Logout</a>
	<br/><br/>
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<!--<tr> 
				<td>Quantity</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>-->
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
