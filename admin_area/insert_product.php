<!DOCTYPE html>

<?php

include("includes/db.php");

// if(!isset($_SESSION['user_email'])) {
  
// echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

// }
// else{

?>  

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inserting product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
  <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
  <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
  <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
  -->
  <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
  <script src="themes/js/less.js" type="text/javascript"></script> -->
  
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
  <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
  <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify --> 
  <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
  <style type="text/css" id="enject"></style>
  </head>

	<link rel="stylesheet" href="styles/style.css" media="all">
</head>


 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

	
</head>

<body bgcolor="skyblue">
	

<form action="insert_product.php" method="get" enctype="multipart/form-data">
	<div class="container">

<table align="center" width="800" height="800"  border="2" bgcolor="#187eae">
	
<tr align="center"> 
	
<td colspan="7"><h2>Insert New Post Here</h2></td>

</tr>

<tr>
	<td align="right"><b>Product Title:</b></td>
	<td><input type="text" name="product_title" size="60" ></td>
</tr>

<tr>
	<td align="right"><b>Product Category:</b></td>

	<td>
		<select name="product_cat" >
			<option>Select a category</option>
			<?php


$get_cat = "select * from categories";

$run_cat= mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];
$cat_title = $row_cat['cat_title'];


echo "<option value='$cat_id'>$cat_title</option>";


}
			?>

		 </select>
	</td>
</tr>

<tr>
	<td align="right"><b>Product Brands:</b></td>
	<td>
		
       <select name="product_brand" >
			
			<option>Select a Brands</option>
			<?php


$get_brand = "select * from brands";

$run_brand = mysqli_query($con,$get_brand);

while ($row_brand=mysqli_fetch_array($run_brand)) {

$brand_id = $row_brand['brand_id'];
$brand_title = $row_brand['brand_title'];


echo "<option value='$brand_id'>$brand_title</option>";


}
			?>


	</td>
</tr>

<tr>
	<td align="right"><b>Product Image:</b></td>
	<td><input type="file" name="product_image" ></td>
</tr>

<tr>
	<td align="right"><b>Product Price:</b></td>
	<td><input type="text" name="product_price" ></td>
</tr>

<tr>
	<td align="right"><b>Product Descreption:</b></td>
	<td><textarea name="product_desc" cols="20" rows="10" ></textarea></td>
</tr>

<tr>
	<td align="right"><b>Product Keywords:</b></td>
	<td><input type="text" name="product_keywords" size="50" ></td>
</tr>

<tr align="center">
		<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"></td>
</tr>

</table>

</body>
</html>

<?php

if(isset($_POST['insert_post'])){

//getting the text data from the fields

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$product_brand = $_POST['product_brand'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];


//gettding the image from the fields

$product_image = $_FILES['product_image'] ['name'];
$product_image_tmp = $_FILES['product_image'] ['tmp_name'];

move_uploaded_file($product_image_tmp, "product_images/$product_image");

 $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords ')";  

$insert_pro = mysqli_query($con, $insert_product);

if($insert_pro) {

	echo "<script>alert('Product Has been inserted!')</script>";
	echo "<script>window.open('index.php?insert_product','_self')</script>";
}


?>

<!-- 
<?php  } ?> -->
