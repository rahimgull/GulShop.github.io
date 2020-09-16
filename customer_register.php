<!DOCTYPE html>
<?php 
session_start();
include("functions/functions.php");

?>

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
	<div class="span6">Welcome!<strong> Dear User</strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php total_items();?> Itemes in your cart </span> </a> 
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
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
    <form class="form-inline navbar-search" method="get" action="results.php"  enctype="multipart/form-data">
    <input id="srchFld" class="srchTxt" type="text" name="user_query" placeholder="search a product" />
      <button type="submit" id="submitButton" class="btn btn-primary" name="search">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="index.php">Home</a></li>
	 <li class=""><a href="all_products.php">All Products</a></li>
	 <li class=""><a href="my_account.php">My Account</a></li>
	 <li class=""><a href="normal.html">Shoping Cart</a></li>
	 <li class=""><a href="contact.html">Contact Us</a></li>
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
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart"> <?php total_items();?>   Items in your cart  <span class="badge badge-warning pull-right"> <?php  total_price(); ?></span></a></div>
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
			<img src="themes/images/products/1.png" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Cigret Liter</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs:885</a></h4>
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

		<div class="span9">		
			<div class="well well-small">

			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
				<a href="product_details.html"><img src="themes/images/products/sprite.jpg" alt=""></a>
                   <div class="caption">
					  <h5>Sprite 1 Liter</h5>
					  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:350</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.html"><img src="themes/images/products/pepsi.jpg" alt=""></a>
					<div class="caption">
					  <h5>Pepsi One Liter</h5>
					  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:350</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.html"><img src="themes/images/products/coca-cola.jpg" alt=""></a>
					<div class="caption">
					  <h5>Coca Cola 1 liter</h5>
					   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:350</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.html"><img src="themes/images/products/1.png" alt=""></a>
					<div class="caption">
					  <h5>Cigret Liter</h5>
					   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:850</span></h4>
					</div>
				  </div>
				</li>
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.html"><img src="themes/images/products/2.png" alt=""></a>
					<div class="caption">
					  <h5>Ball Tape</h5>
					  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">190</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.html"><img src="themes/images/products/3.png" alt=""></a>
					<div class="caption">
					  <h5>Ball </h5>
					  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:190</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a href="product_details.html"><img src="themes/images/products/4.png" alt=""></a>
					<div class="caption">
					  <h5>Snow Spry</h5>
					   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:50</span></h4>
					</div>
				  </div>
				</li>
               <li class="span3">
				  <div class="thumbnail">
					<a href="product_details.html"><img src="themes/images/products/dhaga.jpg" alt=""></a>
					<div class="caption">
					  <h5>Dhaga</h5>
					   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs:3</span></h4>
					</div>
				  </div>
				</li>
			  </ul>
			  </div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>


		<!--Get Product from table==============================================-->
			 <div class="container1">
			 	<div class="row">

			 			<div class="thumbnail">
			 					<form action="customer_register.php" method="post" enctype="multipart/form-data">
                     

        <table align="center" width="800">

          <tr align="center">
            <td colspan="6"><h2>Create an Account</h2></td>
          </tr>

          <tr>
            <td align="right">Customer Name :</td>
            <td><input type="text" name="c_name"></td>
          </tr>
          
          <tr>
            <td align="right">Customer Email :</td>
            <td><input type="text" name="c_email"></td>
          </tr>
          
          <tr>
            <td align="right">Customer Password :</td>
            <td><input type="text" name="c_pass"></td>
          </tr>

          <tr>
            <td align="right">Customer Image</td>
             <td><input type="file" name="c_image"></td>
          </tr>
          

          <tr>
            <td align="right">Customer Country :</td>
            <td>
              <select name="c_country">
                <option>select a country</option>
                <option>Pakistan</option>
                <option>Afghanistan</option>
                <option>Saudi Arab</option>
                <option>United Arab Emirates</option>
                <option>United State</option>
                <option>United Kindom</option>
                <option>India</option>
                <option>Messar</option>
                <option>Kwait</option>
                <option>Shaam</option>
                <option>Yemen</option>
              </select>
            </td>
          </tr>
          

          <tr>
            <td align="right">Customer City :</td>
            <td><input type="text" name="c_city"></td>
          </tr>
          

          <tr>
            <td align="right">Customer Contact :</td>
            <td><input type="text" name="c_contact"></td>
          </tr>


          
          <tr>
            <td align="right">Customer Address :</td>
            <td><textarea cols="20" rows="10" name="c_address"></textarea></td>
          </tr>
          

          <tr align="center">
            <td colspan="6"><input type="submit" name="register" value="Create Account"></td>
          </tr>


        </table>

         


      </form>

     </div>

     </div>


			 					<div class="caption">
			 					</div>
			 				</a>
			 			</div>
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


<?php  //isset  is commond,$_POST is method and register is button

if (isset($_POST['register'])) {  

$ip = getIp();

$c_name =$_POST['c_name'];
$c_email =$_POST['c_email'];
$c_pass =$_POST['c_pass'];
$c_image =$_FILES['c_image']['name'];
$c_image_tmp =$_FILES['c_image'] ['tmp_name'];
$c_country =$_POST['c_country'];
$c_city =$_POST['c_city'];
$c_contact =$_POST['c_contact'];
$c_address =$_POST['c_address'];

move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

 $run_c = mysqli_query($con, $insert_c);

 $sel_cart = "select * form cart where ip_add='$ip'";

 $run_cart = mysqli_query($con, $sel_cart);

$check_cart =mysqli_num_rows($run_cart);

if($check_cart==0){

$_SESSION['customer_email']=$c_email;

  echo "<script>alert('Account has been created  successfully,Thanks')</script>";

  echo "<script>window.open('customer/my_account.php','_self')</script>";
 }

 else {


$_SESSION['customer_email']=$c_email;

  echo "<script>alert('Account has benn created  successfully,Thanks')</script>";

  echo "<script>window.open('checkout.php','_self')</script>";
 }
}

?>