<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" style="padding: 40px;">
	<b>Insert new Brand</b>
	<input type="text" name="new_brand" required="true">
	<input type="submit" name="add_brand" value="Add Brand"></input>
</form>
<?php 
include("includes/db.php"); 

	if(isset($_POST['add_brand'])){
	
	$new_brand = $_POST['new_brand'];
	
	$insert_brand = "insert into brands (brand_title) values ('$new_brand')";

	$run_brand = mysqli_query($con, $insert_brand); 
	
	if($run_brand){
	
	echo "<script>alert('New Brand has been inserted!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	}
 ?>
</body>
</html>
