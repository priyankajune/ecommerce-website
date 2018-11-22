<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>
<html>
<head>
	<title>My Online Shop</title>
	<style type="text/css">
		/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

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
	background: pink;
}

.header_wrapper{
	width: 1000px;
	height: 100px;
	margin: auto;
}
#logo{
	float: left;
}
#banner{
	float: right;
}
.menubar{
	width: 1000px;
	height: 50px;
	background: gray;
	color: white;
}
#menu{
	padding: 0;
	margin: 0;
	line-height: 40px;
	float: left;
}
#menu li{
	list-style: none;
	display: inline;	
}
#menu a{
	text-decoration: none;
	color: white;
	padding: 8px;
	margin: 5px;
	font-size: 18px;
	font-family: COMIC SANS MS;
}
#menu a:hover{
	color: orange;
	font-weight: bolder;
	text-decoration: underline;
}
#form{
	float: right;
	padding-left:8px;
	padding-right: 8px;
	line-height: 40px; 
}
.content_wrapper{
	width: 1000px;
	
	margin: auto;
	background: pink;
}
#content_area{
	width: 800px;
	
	float: left;
	background: pink;
}
#sidebar{
	width: 200px;
	
	background: black;
	float: right;
}
#sidebar_title {
background:white;
color:black;
font-size:22px;
font-family:arial; 
padding:10px;
text-align:center;
}
#cats{
	text-align: left;
}
#cats li{
	list-style: none;
	margin: 5px;
}
#cats a{
	color: orange;
	padding: 8px;
	margin: 5px;
	text-align: left;
	font-size: 17px;
	font-family: comic Sans MS;
	text-decoration: none;
}
#cats a:hover{
color: white;
font-weight: bolder;
text-decoration: underline;
}

#products_box{
	width: 780px;
	text-align: center;
	margin-left: 30px;
	margin-bottom: 10px;
}
#single_product{
	float: left;
	margin-left: 30px;
	padding: 10px;
}
#single_product img{
	border: 2px solid black;
}
#shopping_cart{
	width: 800px;
	height: 50px;
	background: black;
	color: white;
}
#footer{
	width: 1000px;
	height: 100px;
	background: gray;
	clear: both;
}
	</style>
</head>
<body>
<div class="main_wrapper">
	
<div class="header_wrapper">
	<a href="../index.php"><img id="logo" src="images/logo.gif"></a>
	<img id="banner" src="images/ad_banner.gif">
	
</div>
<div class="menubar">
		
<ul id="menu">
	<li><a href="../index.php">Home</a></li>
	<li><a href="../all_products.php">Our Products</a></li>
	<li><a href="my_account.php">My Account</a></li>
	<li><a href="#">Sign Up</a></li>
	<li><a href="../cart.php">Shopping Cart</a></li>
	<li><a href="#">Contact Us</a></li>

</ul>
<div id="form">
	<form method="get" action="results.php" enctype="multipart/form-data">
		<input type="text" name="user_query" placeholder="Search A Product" />
		<input type="submit" name="search" value="Search">

	</form>
</div>

	</div>
<div class="content_wrapper">
	<div id="sidebar">
			
	<div id="sidebar_title">My Account</div>
	<ul id="cats">

		<?php
		$user=$_SESSION['customer_email'];

		$get_img="select * from customers where customer_email='$user'";
		$run_img=mysqli_query($con,$get_img);

		$row_img=mysqli_fetch_array($run_img);

		$c_image=$row_img['customer_image'];

		$c_name=$row_img['customer_name'];

		echo "<p style='text-align: center;border: 2px solid white;padding: 4px;'><img src='customer_images/$c_image' width='150px' height='150px'></p>";
		?>
		<li><a href="my_account.php?my_orders">My Orders</a></li>
		<li><a href="my_account.php?edit_account">Edit Account</a></li>
		<li><a href="my_account.php?change_pass">Change Password</a></li>
		<li><a href="my_account.php?delete_account">Delete Account</a></li>
		<li><a href="logout.php">Logout</a></li>


	</ul> 
	</div>
	
<div id="content_area">

	<?php
		cart();

	?>

	<div id="shopping_cart">
		<span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
			<?php
				if (isset($_SESSION['customer_email'])) {
					echo "<b>Welcome: </b>" . $_SESSION['customer_email'] ;
				}
			?>
		<?php 
		if (!isset($_SESSION['customer_email'])) {
			echo "<a href='../checkout.php' style='color:orange;'>Log In</a>";
		}
		else
		{
			echo "<a href='../logout.php' style='color:orange;'>Log Out</a>";
		}

		?>
		</span>

	</div>

	
	<div id="products_box">
		<?php
			if(!isset($_GET['my_orders']))
			{
				if(!isset($_GET['edit_account']))
				{
					if(!isset($_GET['change_pass']))
					{
						if(!isset($_GET['delete_account'])){

		echo "
		<h2 style='padding: 20px;'>Welcome: $c_name</h2><br>
		
		<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";		}
			}
			}
			}

		?>
		
		<?php 
			if(isset($_GET['edit_account']))
			{
				include("edit_account.php");
			}
			if(isset($_GET['change_pass']))
			{
				include("change_pass.php");
			}

			if(isset($_GET['delete_account']))
			{
				include("delete_account.php");
			}

		 ?>
	</div>


</div>
</div>

<div id="footer">
<h2 style="text-align: center; padding-top:30px; ">
	&copy; 2018 by Priyanka
</h2>
</div>
</div>
</body>
</html>