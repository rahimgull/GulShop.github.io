<?php 
include("includes/db.php");
//include("functions/functions.php");


?>
<div>

<form method="post" action="">

	<table width="500" align="center" bgcolor="skyblue" cellspacing="3">

		<tr align="center">
			<td colspan="4"><h2 style="color: green;">Login or Register to Buy!</h2></td>
		</tr>
		
		<tr>
			<td align="right"><b>Email:</b></td>
			<td><input type="text" name="email" placeholder="enter email" required/></td>
		</tr>

		<tr>
			<td align="right"><b>Password:</b></td>
			<td><input type="password" name="pass" placeholder="enter password" required/></td>
		</tr>

		<tr align="center">
			<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password</a></td>
		</tr>

		<tr align="center">
			<td colspan="3"><input type="submit"  class="btn btn-success"   name="login" value="Login"></td>
			</tr>

	</table>

	
	<a href="customer_register.php"><h2 style="float:right; padding-right:30px; color:white;text-decoration: none;" class="btn btn-success">New? Register Here</h2></a>





</form>


<?php
if(isset($_POST['login'])){

	$c_email = $_POST['email'];
	$c_pass = $_POST['pass'];

	$sel_c = "select * from customers where customer_pass= '$c_pass' AND customer_email = '$c_email'";

	$run_c = mysqli_query($con, $sel_c);

	$check_customer = mysqli_num_rows($run_c);

	if($check_customer==0){
		echo "<script>alert('Password or email is incorrect , plz try again!')</script>";
		exit();
	}

$ip = getIp();

 $sel_cart = "select * form cart where ip_add='$ip'";

 $run_cart = mysqli_query($con, $sel_cart);

$check_cart =mysqli_num_rows($run_cart);

if($check_customer>0 AND $check_cart==0){


$_SESSION['customer_email']=$c_email;

  echo "<script>alert('You Logged in successfully,Thanks')</script>";

  echo "<script>window.open('my_account.php','_self')</script>";
}

else {


$_SESSION['customer_email']=$c_email;

  echo "<script>alert('You Logged in successfully  ,Thanks')</script>";

  echo "<script>window.open('checkout.php','_self')</script>";
}
}


?>



</div>