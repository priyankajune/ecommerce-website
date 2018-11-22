<!DOCTYPE html>
<?php

include("includes/db.php");
session_start();
//the below statement is important for security reasons..so that people cannot open pages that are in  
//public folder and can be done for all files..close php bracket at the end of this file
if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
  ?>
<html>
<head>
	<title>Inserting Product</title>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center" width="795" border="2" bgcolor="#187eae">
		
	<tr align="center">
		<td colspan="8"><h2>Insert New Post Here</h2></td>

	</tr>
	<tr>
		<td align="right"><b>Product Title:</b></td>
		<td><input type="text" name="product_title" size="60" required="true"></td>
	</tr>
	<tr>
		<td align="right"><b>Product Category:</b></td>
		<td>
			
			<select name="product_cat" required="true">
					<option>Select a Category</option>
					<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	
	
	}
					
					?>
				</select>
		</td>
	</tr>
	<tr>
		<td align="right"><b>Product Brand:</b></td>
		<td><select name="product_brand" required="true" >
					<option>Select a Brand</option>
					<?php 
		$get_brands="select * from brands";
$run_brands=mysqli_query($con,$get_brands);

while($row_brands=mysqli_fetch_array($run_brands)){

	$brand_id= $row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];

	
	echo "<option value='$brand_id'>$brand_title</option>";
}
					
					?>
				</select></td>
	</tr>
	<tr>
		<td align="right"><b>Product Image:</b></td>
		<td><input type="file" name="product_image" required="true"></td>
	</tr>
	<tr>
		<td align="right"><b>Product Price:</b></td>
		<td><input type="text" name="product_price" required="true"></td>
	</tr>
	<tr>
		<td align="right"><b>Product Description:</b></td>
		<td>
			<textarea name="product_desc" cols="20" rows="10"></textarea>

		</td>
	</tr>
	<tr>
		<td align="right"><b>Product Keywords:</b></td>
		<td><input type="text" name="product_keywords" size="50" required="true"></td>
	</tr>
	<tr align="center" >
		
		<td colspan="8"><input type="submit" name="insert_post" value="Insert Product Now"></td>
	</tr>
	</table>


</form>

</body>
</html>
<?php
$product_title=$product_cat=$product_brand=$product_price=$product_desc=$product_keywords=$product_image="";
//insert_post is name to submit button
if (isset($_POST['insert_post'])) {
	
//getting text data from field
	if (isset($_POST['product_title'])) {
	$product_title=$_POST['product_title'];	
	}
	if (isset($_POST['product_cat'])) {
	$product_cat=$_POST['product_cat'];
				
	}
	if (isset($_POST['product_brand'])) {
	$product_brand=$_POST['product_brand'];
				
	}
	if (isset($_POST['product_price'])) {
	$product_price=$_POST['product_price'];
			
	}
	if (isset($_POST['product_desc'])) {
	$product_desc=$_POST['product_desc'];
				
	}
	if (isset($_POST['product_keywords'])) {
	$product_keywords=$_POST['product_keywords'];
		
	}
	//getting image
	//video/images are targeted by FILE
	if (isset($_FILES['product_image']['name'])) {
	$product_image=$_FILES['product_image']['name'];
				
	}
	//temporary name of image,tmp_nameis default name in the system
	if (isset($_FILES['product_image']['tmp_name'])) {
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
				
	}
//upload image
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	 $insert_product="insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	 $insert_pro=mysqli_query($con,$insert_product);

	 if ($insert_pro) {
	 	echo "<script>alert('Product has been inserted')</script>";
	 	echo "<script>window.open('index.php?insert_product','_self')</script>";
	 }

}
?>
<?php
}
?>