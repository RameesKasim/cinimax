<?php
include 'connect.php';
if(isset($_GET['type'])&& !empty($GET['type']))
{
 $ty=$_GET['type'];
 $sq="select * from seat where s_type='$ty'";
 $r=mysqli_query($con,$sq)or die(mysqli_error($con));
 $rw=mysqli_fetch_array($re);
 echo $rw['price'];
}
else
{
	echo error;
}

?>

