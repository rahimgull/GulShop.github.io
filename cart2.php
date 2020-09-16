<?php 
session_start();
include("functions/functions.php");
include("includes/db.php");

if(isset($_POST["add_to_cart"]))
 { 
 	if(isset($_SESSION["shopping_cart"]))
  { 
  	$item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); 
  if(!in_array($_GET["id"], $item_array_id)) 
  	{
  	 $count = count($_SESSION["shopping_cart"]);
  	  $item_array = array( 'item_id' => $_GET["id"], 'item_name' => $_POST["hidden_name"], 'item_price' => $_POST["hidden_price"], 'item_quantity' => $_POST["quantity"] );

  	 $_SESSION["shopping_cart"][$count] = $item_array; 
  	} 
  	 else {
echo '<script>alert("Item Already Added")</script>'; 
echo '<script>window.location="try.php"</script>'; 
} 
} 
else { 
	$item_array = array( 'item_id' => $_GET["id"], 'item_name' => $_POST["hidden_name"], 'item_price' => $_POST["hidden_price"], 'item_quantity' => $_POST["quantity"] );

 $_SESSION["shopping_cart"][0] = $item_array;
  }
   }

 if(isset($_GET["action"])) { if($_GET["action"] == "delete") { 
 	
 	foreach($_SESSION["shopping_cart"] as $keys => $values) 
 	{ 
 		if($values["item_id"] == $_GET["id"]) 
 			{
 			 unset($_SESSION["shopping_cart"][$keys]); 
 		echo '<script>alert("Item Removed")</script>'; 
 		echo '<script>window.location="try.php"</script>'; 
 	}
 	 }
 	  }
 	   }
 	    ?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gul Whole Sale Online Shop</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 		 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
 		 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	
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
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome :<strong>Mung ta der gran User :</strong>       
         <?php

         if(isset($_SESSION['customer_email'])){
          echo $_SESSION['customer_email'];
           
           }

         ?>     </div>
	<div class="span5">
	<div class="pull-right">
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php total_items();?> Itemes in cart </span> </a> 
	</div>
	</div>
</div>

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
       <a class="brand" href="index.php"><img src="themes/images/logo2.png" alt="Bootsshop" width="170" height="30" /></a>
    <form class="form-inline navbar-search" method="get" action="results.php"  enctype="multipart/form-data">
    <input id="srchFld" class="srchTxt" type="text" name="user_query" placeholder="search a product" />
      <button type="submit" id="submitButton" class="btn btn-primary" name="search">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="index.php">Home</a></li>
	 <li class=""><a href="all_products.php">All Products</a></li>
	 <li class=""><a href="my_account.php">My Account</a></li>
	 <li class=""><a href="cart.php">Shoping Cart</a></li>
	 <li class=""><a href="contact.php">Contact Us</a></li>
	 <li class="">
	 <a href="checkout.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	 <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input type="text" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			</form>		
			<button type="submit" class="btn btn-success">Sign in</button>OR
			<button type="submit" class="btn btn-success">Register Now!</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>


		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
	
<!-- Header End====================================================================== -->

<div id="mainBody">
	<div class="container">
	<div class="row">

<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart"> <?php total_items();?>   Items in cart  <span class="badge badge-warning pull-right"> <?php  total_price(); ?></span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu"><a>Categories</a>
				<ul id="cats">

				<?php getCats(); ?>
				
				</ul>



			</li>
			<li class="subMenu"><a>Brands</a>
			<ul style="display:none">
				
				<?php getBrands(); ?>

			</ul>
			</li>
			
		<br/>
		  <div class="thumbnail">
			<img src="themes/images/products/1.jpg" alt="Bootshop panasonoc New camera" />
			<div class="caption">
				
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->

<!-- Show images in slidshow=============================================== -->


		<!--Get Product from table==============================================-->

			 

<div class="container" style="width:800px;float: left;">
<h3 align="center">Simple PHP Mysql Shopping Cart</h3><br /> 



<?php

 $query = "SELECT * FROM products ORDER BY product_id ASC"; 
$result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0) 
 	{ 
 		while($row = mysqli_fetch_array($result)) { ?>
 	 <div class="col-md-4"> 
 	 	<form method="post" action="try.php?action=add&id=<?php echo $row["product_id"]; ?>">
 	 	 <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
 	 	  <img src="admin_area/product_images/<?php echo $row["product_image"]; ?>" class="img-responsive" /><br /> 
 	 	  <h4 class="text-info"><?php echo $row["product_title"]; ?></h4>
 	 	   <h4 class="text-danger">$ <?php echo $row["product_price"]; ?></h4>
 	 	    <input type="text" name="quantity" class="form-control" value="1" /> 
 	 	    <input type="hidden" name="hidden_name" value="<?php echo $row["product_title"]; ?>" />
 	 	     <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />
 	 	      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" /> </div>
 	 	       </form> </div> <?php } } ?> <div style="clear:both"></div> <br />
 	 	        <h3>Order Details</h3> <div class="table-responsive"> 
 	 	        	<table class="table table-bordered"> <tr> <th width="40%">Item Name</th>
 	 	        	 <th width="10%">Quantity</th> <th width="20%">Price</th> <th width="15%">Total</th> <th width="5%">Action</th> </tr> <?php if(!empty($_SESSION["shopping_cart"]))
{ $total = 0; foreach($_SESSION["shopping_cart"] as $keys => $values) { ?> <tr> <td><?php echo $values["item_name"]; ?></td>
 <td><?php echo $values["item_quantity"]; ?></td>
  <td>$ <?php echo $values["item_price"]; ?></td> 
  <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
   <td><a href="try.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td> </tr> <?php $total = $total + ($values["item_quantity"] * $values["item_price"]); } ?>
 <tr> <td colspan="3" align="right">Total</td> 
 	<td align="right">$ <?php echo number_format($total, 2); ?>
 		
 	</td> <td></td> </tr>
 	 <?php } ?> 
</table> 
</div> 











	
			 			
			 		
			 	</div>
			 </div>
</div>
</ul>
</div>
</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a> 
				<a href="login.html">ADDRESSES</a> 
				<a href="login.html">DISCOUNT</a>  
				<a href="login.html">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.html">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Bootshop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>