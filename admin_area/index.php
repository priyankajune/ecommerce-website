<?php 

session_start();
if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You are not an Admin','_self')</script>";
}
else
{

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>This is Admin Panel</title>
	<style type="text/css">
		

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}

body{
	background: skyblue;
}

.main_wrapper{
	width: 1000px;
	height: auto;
	margin: auto;
}

#header{
	width: 1000px;
	height: 120px;
	background-image: url(images/bg-header.jpg);
	border-bottom: 5px groove orange;
}
#left{
	width: 795px;
	height: 600px;
	background-image: url(images/bg-body.gif);
	float: left;
}
#right{
	width: 200px;
	height: 645px;
	float: right;
	border-left: 5px groove orange;
	background: #187eae;
}
#right a{
	text-decoration: none;
	color: white;
	text-align: left;
	font-size: 18px;
	font-family: Palatino;
	padding: 6px;
	margin: 6px;
	display: block;
}
#right a:hover{
	text-decoration: underline;
	font-weight: bolder;
	color: orange;
	
}


</style>
</head>
<body>
<div class="main_wrapper">
<div id="header"></div>
<div id="right">
<h2 style="text-align: center;">Manage Content</h2>
<a href="index.php?insert_product">Insert New Product</a>
<a href="index.php?view_products">View All Products</a>
<a href="index.php?insert_cat">Insert New Category</a>
<a href="index.php?view_cats">View All Categories</a>
<a href="index.php?insert_brand">Insert New Brand</a>
<a href="index.php?view_brands">View Brands</a>
<a href="index.php?view_customers">View Customers</a>
<a href="index.php?view_orders">View Orders</a>
<a href="index.php?view_payments">View Payments</a>
<a href="logout.php">Admin LogOut</a>

</div>
<div id="left">
	<br><br>
<h2 style="color: red;text-align: center;"><?php echo @$_GET['logged_in']; ?></h2>	
<?php 
if (isset($_GET['insert_product'])) {
	include("insert_product.php");
}
if (isset($_GET['view_products'])) {
	include("view_products.php");
}

if (isset($_GET['edit_pro'])) {
	include("edit_pro.php");
}
if (isset($_GET['insert_cat'])) {
	include("insert_cat.php");
}
if (isset($_GET['view_cats'])) {
	include("view_cats.php");
}
if (isset($_GET['edit_cat'])) {
	include("edit_cat.php");
}
if (isset($_GET['insert_brand'])) {
	include("insert_brand.php");
}
if (isset($_GET['view_brands'])) {
	include("view_brands.php");
}
if (isset($_GET['edit_brand'])) {
	include("edit_brand.php");
}
if (isset($_GET['view_customers'])) {
	include("view_customers.php");
}
?>

</div>
</div>
</body>
</html>
<?php
}
?>

