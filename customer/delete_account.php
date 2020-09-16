
<br>
<h2 style="text-align: center; color: red;">Do you really want to delete your account?</h2>
<form action="" method="post" style="text-align: center; ">
      
      <br><br>
    
	<input type="submit" name="yes" value="Yes">
	<input type="submit" name="no" value="No">
	


</form>

<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){

	$delete_customer = "delete from customers where customer_email='$user'";

	$run_custmoer = mysqli_query($con,$delete_customer);
    
    echo "<script>alert('we are really sorry your account has been deleted')</script>";
    echo "<script>window.open('my_account.php','_self')</script";
}


?>