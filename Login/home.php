<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
     <h1>Well Come!, <?php echo $_SESSION['name']; ?></h1>
     <a href="index.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>