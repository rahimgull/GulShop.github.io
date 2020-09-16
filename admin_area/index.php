<?php
session_start();

if(!isset($_SESSION['user_email'])) {
  
echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

}
else{


?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
   <title>This is admin panel</title>
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
      <link rel="stylesheet" href="styles/style.css" media="all">
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
<body>
<div class="main_wrapper">
	
	<div id="header"></div>

    <div id="right">


   <h2 style="text-align: center;">Manage Content</h2>

   <a href="index.php?insert_product">Insert New Product</a>
   <a href="index.php?view_products">View All Products</a>
   <a href="index.php?insert_cat">Insert New Categories</a>
   <a href="index.php?view_cats">View All Categories</a>
   <a href="index.php?insert_brand">Insert New Brands</a>
   <a href="index.php?view_brands">View All Brands</a>
   <a href="index.php?view_customers">View Customers</a>
   <a href="index.php?view_orders">View Orders</a>
   <a href="index.php?view_payments">View Payments</a>
   <a href="logout.php">Admin Logout</a>


    </div>

    <div id="left">
    <h2 style="color: red ; text-align: center;"><?php echo @$_GET['logged_in']; ?></h2>

<?php
if(isset($_GET['insert_product'])){

include("insert_product.php");

}


if(isset($_GET['view_products'])){

include("view_products.php");

}


if(isset($_GET['edit_pro'])){

include("edit_pro.php");

}



if(isset($_GET['insert_cat'])){

include("insert_cat.php");


}


if(isset($_GET['view_cats'])){

include("view_cats.php");

}



if(isset($_GET['edit_cat'])){

include("edit_cat.php");

}


if(isset($_GET['insert_brand'])){

include("insert_brand.php");

}



if(isset($_GET['view_brands'])){

include("view_brands.php");

}



if(isset($_GET['edit_brand'])){

include("edit_brand.php");

}



if(isset($_GET['view_customers'])){

include("view_customers.php");

}




?>


</div>

</div>

</body>
</html>
<?php } ?>