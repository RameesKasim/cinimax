<?php
include 'connect.php';
session_start();
if(!isset($_SESSION)||!($_SESSION['username']=='admin'))
  {
	  header('location:../index.php');
  }
  $query="select * from regtb where username!='admin'";
  $result=mysqli_query($con,$query);
 if(isset($_POST['btn']))
  { 
	 $user=$_POST['usr'];
	 $q1="select * from regtb where username='$user'";
	 $reslt=mysqli_query($con,$q1);
	 $r1=mysqli_fetch_array($reslt);
	 $ab=$r1['email'];
     $sq="select * from reservation where email='$ab'";
	 $r2=mysqli_query($con,$sq)or die(mysqli_error($con));
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registered User</title>

    <!-- Bootstrap -->
    <link href="http:../css/bootstrap.min.css" rel="stylesheet">
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
						<li><a href="">User List</a></li>
					    <li><a href="screen.php">Screen</a></li>
						<li><a href=""><img src="../img/user/admin.jpg" height='30' width='30'class="img-circle" ></a></li>
						<li><a href="../logout.php"><button class="btn-info">logout</button></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	
	<div id="feature">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<br><br><br><br>
					
					<h3>Registered User</h3>
				</div>
				<?php 
				while($row=mysqli_fetch_array($result))
				{
				?>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
						    <br><br>
							<img  width='100' height='90' src="../img/user/<?php echo $row['image'];?>" >
							<?php $a=$row['username'];?>
							<form method="POST" action="#User">	
							<input type="hidden" name='usr' value="<?php echo $a;?>">
							<h2><input type="submit" class="btn btn_default"  name='btn' value="<?php echo $row['fname'].' '.$row['lname'] ?>"></h2>
							</form>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
	<div id="User">
		 <?php if(isset($_POST['btn']))
		 { 
		 ?>
		 <div class="container">
		 <div class="text-center"><h2>Personal Details<br></h2></div>
		 <div class="col-md-3 col-md-offset-2">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <br><img width='240' height='270' src="../img/user/<?php echo $r1['image'];?>" >
		 </div>
		 </div>
		 <div class="col-md-6 col-md-offset-0">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <h2><div clas="row" >
			     <div class="col-md-3">Name </div>
				 <div class="col-md-offset-4"><?php echo $r1['fname']." ".$r1['lname']?></div><br>
			 </div>
			 <div clas="row" >
			     <div class="col-md-3">Age </div>
				 <div class="col-md-offset-4">
					<?php 
						$d=new DateTime('Today');
						$d1=new DateTime($r1['dob']);
						echo $d1->diff($d)->y;
					?></div><br>
			 </div>	 
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
				<h4>ID</h4>
			</div>
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
				<h4><?php echo $rw1['r_id']; ?></h4>
			</div>
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
			</div>
			</div>
		 <?php
		  }
		 }?>
	</div>
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
  </body>
</html>