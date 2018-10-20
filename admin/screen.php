<?php
include 'connect.php';
session_start();
if(!isset($_SESSION)||!($_SESSION['username']=='admin'))
  {
	  header('location:../index.php');
  }
  $query="select * from show_details s,films f,showtime t where s.sh_id=t.sh_id and s.movie_id=f.id";
  $result=mysqli_query($con,$query);

  if(isset($_POST['btn']))
  {
	$a=$_POST['show'];
	$sq1="delete from show_details where shd_id='$a'";
	mysqli_query($con,$sq1);
	header('location:message.php');
  }
  if(isset($_POST['submit']))
  {
	$a='b';
	$b='Ranam';
	$sq2="select * from showtime where show_name='$a'";
	$sq3="select * from films where name='$b'";
	$r1=mysqli_query($con,$sq2);
	$r2=mysqli_query($con,$sq3);
	$rw1=mysqli_fetch_array($r1);
	$rw2=mysqli_fetch_array($r2);
	$s=$rw1['sh_id'];
	$m=$rw2['id'];
	$sq4="insert into show_details (sh_id,movie_id) values ('$s','$m')";
	$r1=mysqli_query($con,$sq4)or die(mysqli_error($con));
	header('location:message.php');
  }
  if(isset($_POST['subm']))
  {
	$a=$_POST['shtime'];
	$b=$_POST['shname'];
	$sq5="insert into showtime (show_name,show_time,balcony_seats,general_seats) values ('$b','$a',20,130)";
	mysqli_query($con,$sq5)or die(mysqli_error($con));
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Screen</title>

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
                        <li><a href="addashboard.php">Movie</a></li>
						<li><a href="user.php">User List</a></li>
					    <li><a href="">Screen</a></li>
						<li><a href=""><img src="../img/user/admin.jpg" height='30' width='30'class="img-circle" ></a></li>
						<li><a href="../logout.php"><button class="btn-info">logout</button></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	
	<div id="feature">
	<?php
	 if(!isset($_POST['addsh'])&&!isset($_POST['adsh']))
	 {
	?>
	<br><br><br><br>
		<div class="container">
			<div class="hi-icon-wrap hi-icon-effect">		
			<div class="row">
				<div class="text-center">
					<br>
					<div class='row'>
					<div class='col-md-6 col-md-offset-3'>
					<h3>Show Details</h3>
					</div>
					<div class='col-md-2'>
					<form method="POST" action="#addshw">	
					<input type="submit" class="btn btn_default"  name='addsh' value="Add Show">
					</form>
					</div>
					</div>
				</div><br>
				<div class="text-center">
				<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<h4>Show Name</h4>
				</div>
				<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<h4>Show Time</h4>
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4>Movie</h4>							
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4>Balcony Tickets Booked</h4>
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4>General Tickets Booked</h4>	
				</div>
				</div>
			</div>
			<?php 
			while($row=mysqli_fetch_array($result))
			{
			?>
			<div class='row'>
			<div class="text-center">
				<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<h4><?php echo $row['show_name'] ?></h4>
				</div>
				<div class="col-md-2 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<h4><?php echo $row['show_time'] ?></h4>
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4><?php echo $row['name'] ?></h4>							
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4><?php echo $row['booked_btickets'] ?></h4>
				</div>
				<div class="col-md-2 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<h4><?php echo $row['booked_gtickets'] ?></h4>	
				</div>
				<form method="POST" action="">	
				<input type="hidden" name='show' value="<?php echo $row['shd_id'];?>">
				<h2><input type="submit" class="btn btn_default"  name='btn' value="Delete"></h2>
				</form>
				</div>
			</div>
			<?php
			}
			?>
			</div>
		</div>
	<?php
	 }
	?>
	</div>
	<div id='addshw'>
	<?php
	 if(isset($_POST['addsh']))
	 {
	?>
	<div class="container">
		<div class="hi-icon-wrap hi-icon-effect">
		 <br><br><br><br><br>
		 <form action='screen.php' method='post'><input type='submit' class="btn btn-link"  value='Go back'></form>
		 <div class="text-center">
		 <h3>Add Show Form</h3>
		 <form method="POST" action="#adshw">	
			<input type="submit" class="btn btn_default"  name='adsh' value="Add Show Time">
			</form>
		 <br><br></div>
		 <form action="" method="POST"> 
		  <div clas="row" >			   
			<b><div class="col-md-6 col-md-offset-4">Show Time </div>
			<div class="col-md-3 col-md-offset-0"></div>
			<br><br>
		  </div>
		  <div clas="row" >			   
			<div class="col-md-6 col-md-offset-4">Show Name </div>
			<div class="col-md-3 col-md-offset-0"></div><br><br>
		  </div>	
		  <div clas="row" >			   
			<div class="col-md-6 col-md-offset-4">Movie </div>
			<div class="col-md-3 col-md-offset-0"></div><br><br>
		  </div>	
		  <div clas="row" >
			 <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='submit' value='      Add   ' ></div>
			 <div class="col-md-offset-0"><input type="Reset"  class='btn-info' value='   Reset     '></div>
			</div></b>
		 </form>  
		</div>
	</div>
			<?php 
	 }
	 ?>
	</div>	 

	<div id='adshw'>
	<?php
	 if(isset($_POST['adsh']))
	 {
	?>
	<div class="container">
		<div class="hi-icon-wrap hi-icon-effect">
		 <br><br><br><br><br>
		 <form action='screen.php' method='post'><input type='submit' class="btn btn-link"  value='Go back'></form>
		 <div class="text-center">
		 <h3>Add Show Time</h3>
		 <br><br></div>
		 <form action="" method="POST"> 
		  <div clas="row" >			   
			<b><div class="col-md-3 col-md-offset-3">Show Time </div>
			<div class="col-md-3 col-md-offset-0"><input type='time' name='shtime' value='00:00'></div>
			<br><br>
		  </div>
		  <div clas="row" >			   
			<div class="col-md-3 col-md-offset-3">Show Name </div>
			<div class="col-md-3 col-md-offset-0"><input type='text' name='shname' ></div><br><br>
		  </div>	
		  <div clas="row" >
			 <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='subm' value='      Add   ' ></div>
			 <div class="col-md-offset-0"><input type="Reset"  class='btn-info' value='   Reset     '></div>
			</div></b>
		 </form>  
		</div>
	</div>
			<?php 
	 }
	 ?>
	</div>	
			
			
		<div class="social-icon">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">						
					<ul class="social-network">
						<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
					</ul>						
				</div>
			</div>
		</div>						
		<div class="text-center">
			<div class="copyright">
				&copy; 2015 <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">bootstraptaste</a>. All Rights Reserved.
			</div>
            <!-- 
                All links in the footer should remain intact. 
                Licenseing information is available at: http://bootstraptaste.com/license/
                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bikin
            -->
		</div>									
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.1.1.min.js"></script>		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>	
	<script src="../js/parallax.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/fliplightbox.min.js"></script>
	<script src="../js/functions.js"></script>
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>	
  </body>
</html>