<?php
include 'connect.php';
session_start();
if(!isset($_SESSION)||(!$_SESSION['username']=='admin'))
  {
	  header('location:../index.php');
  }
 $usr=$_SESSION['username'];
 $query="select * from regtb where username='$usr'";
 $result=mysqli_query($con,$query);
 $r1=mysqli_fetch_array($result);
 $ab=$r1['email'];
 $sq="select * from reservation where email='$ab'";
 $r2=mysqli_query($con,$sq)or die(mysqli_error($con));
 if(isset($_POST['update']))
 {
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mob=$_POST['tel'];
  $dob=$_POST['dob'];
  $age=$_POST['age'];
  $q1="update regtb set fname='$fname', lname='$lname', dob='$dob', age='$age', email='$email', phnno='$mob' where username='$usr'";
  mysqli_query($con,$q1);
  header('location:usrprfle.php');
  
 } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bikin - HTML Bootstrap Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/overwrite.css">
	<link href="../css/animate.min.css" rel="stylesheet"> 
	<link href="../css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>	
	<header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">CINIMAX</a>
                </div>				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       <li><a href="usrdashboard.php">Home</a></li>
                        <li><a href="movies.php">Movies</a></li>
					    <li><a href="usrprfle.php"><img src="../img/user/<?php echo $r1['image'];?>" class="img-circle" width='30' height='30'></a></li>
						<li><a href="../logout.php"><button class="btn-info">logout</button></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->
	<div>
	<?php if(!isset($_GET['edit'])){?>
	<div id="User">
		<br><br><br><br><br><br> 
		 <div class="container">
		 <div class="text-center"><h2>Personal Details<br></h2></div>
		 <div class="col-md-10 col-md-offset-10">
		 <form action="#edit" method="GET">
		 <input type="submit" name='edit' class="btn btn-link" style="pixel:50px; font-size:13px "value='Edit Profile'>
		 </form></div>
		 <div class="col-md-3 col-md-offset-2">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <br><img width='240' height='270' src="../img/user/<?php echo $r1['image'];?>" >
		 </div>
		 </div>
		 <div class="col-md-7 col-md-offset-0">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <h2><div clas="row" >
			     <div class="col-md-3">Name </div>
				 <div class="col-md-offset-4"><?php echo $r1['fname']." ".$r1['lname']?></div>
				 <br>
			 </div>
			 <div clas="row" >
			     <div class="col-md-3">Age </div>
				 <div class="col-md-offset-4"><?php echo $r1['age'] ?></div>	 
		     <div clas="row" >
			     <div class="col-md-3">Gender </div>
				 <div class="col-md-offset-4"><?php echo $r1['gender']?></div><br>
			 </div>	 
		     <div clas="row" >
			     <div class="col-md-3">User Name </div>
				 <div class="col-md-offset-4"><?php echo $r1['username']?></div><br>
			 </div>	 
		     <div clas="row" >
			     <div class="col-md-3">Phone </div>
				 <div class="col-md-offset-4"><?php echo $r1['phnno']?></div><br>
			 </div>	 
		     <div clas="row" >
			     <div class="col-md-3">Email </div>
				 <div class="col-md-offset-4"><?php echo $r1['email']?></div>
			 </div>	 
					 
		 </h2>
		 </div>
		 </div>
		 </div>
		 <div class="hi-icon-wrap hi-icon-effect">
		 <div class="text-center"><h2>Reservation Details<br></h2></div>
		 <div class="text-center">
			<div class="col-md-1 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Date</h4>
			</div>
			<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Movie</h4>
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Show Time</h4>							
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Seat Type</h4>
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Number of Tickets</h4>	
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4>Total Amount</h4>	
			</div>
			</div>
			<?php
			while($rw1=mysqli_fetch_array($r2))
			{
			?>
			<div class='row'>		 
		    <div class="text-center">
			<div class="col-md-1 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['date']; ?></h4>
			</div>
			<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['m_name']; ?></h4>
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['show_time']; ?></h4>							
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['seat_type']; ?></h4>
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['no_of_tickets']; ?></h4>	
			</div>
			<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
				<h4><?php echo $rw1['amount']; ?></h4>	
			</div>
			<form method="POST" action="">	
				<input type="hidden" name='ticket' value="<?php echo $rw1['r_id'];?>">
				<h2><input type="submit" class="btn btn_default"  name='btn' value="Delete"></h2>
			</form>
			</div>
			</div>
			<?php
			}
			?>
			</div>
	</div>
	<?php }?>
	
	
	<?php if(isset($_GET['edit'])){?>
	<div id="edit">
		<br><br><br><br><br> 
	
		<div class="container">
		<div class="hi-icon-wrap hi-icon-effect">
		 <div class="text-center"><h2>Update Personal Details<br><br></h2></div>
		  <form action="" method="POST" enctype="multipart/form-data"> 
			 <b><div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">First Name </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="fname" name="fname" value="<?php echo $r1['fname'] ?>" required></div>
			    <div class="col-md-2 col-md-offset-0">Last Name </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="lname" name="lname" value="<?php echo $r1['lname']?>" required></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Date of Birth </div>
				<div class="col-md-3 col-md-offset-0"><input type="date" name="dob" value="<?php echo $r1['dob']?>" min="1950-01-01" max="2018-01-01" required></div>
			    <div class="col-md-2 col-md-offset-0">Age </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="age" name="age" value="<?php echo $r1['age']?>" pattern='[0-9]*' required></div><br><br>
			  </div>	
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1"> </div>
				<div class="col-md-3 col-md-offset-0"></div>
			    <div class="col-md-2 col-md-offset-0"></div>
				<div class="col-md-3 col-md-offset-0"></div>
			  </div>	
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Email </div>
				<div class="col-md-3 col-md-offset-0"><td><input type="email" id="email" name="email" value="<?php echo $r1['email'] ?>"></div>
			    <div class="col-md-2 col-md-offset-0">Mobile Number </div>
				<div class="col-md-3 col-md-offset-0"><input type="tel" pattern="[7,8,9][0-9]{9}" value="<?php echo $r1['phnno']?>" maxlength='10' id="tel" name="tel" oninvalid="setCustomValidity('please enter a valid telephone number')"placeholder="Phone Number"></div><br><br>
			  </div>
			  <div clas="row" >
			     <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='update' value='      Update      ' ></div>
			     </form>
				 <div class="col-md-offset-0"><button   class='btn-info' onclick="index.php" style="width:90px">      Reset     </button></div>
			    </div></b>
	<?php
	}?>		  
			</div>
			</div>