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
 $row=mysqli_fetch_array($result);
 $t=date("d-m-y");
 $t1=date('d-m-y',strtotime('tomorrow'));
 $t2=date('d-m-y',strtotime('+2 days'));
 $q1="select * from films where films.id in(select movie_id from show_details) ";
 $result=mysqli_query($con,$q1);
 if(isset($_POST['register']))
 {
	 $m=$_POST['movie'];
	 $d=$_POST['date'];
 }
 if(isset($_POST['book']) && isset($_POST['date']))
 {
  $q="select * from seat";
  $re5=mysqli_query($con,$q);
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
                        <li class="active"><a href="#header">Home</a></li>
                        <li><a href="movies.php">Movies</a></li>
					    <li><a href="usrprfle.php"><img src="../img/user/<?php echo $row['image'];?>" class="img-circle" width='30' height='30'></a></li>
						<li><a href="../logout.php"><button class="btn-info">logout</button></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	 <style>
  </style>
	<br><br><br><br><br><br><br><br>
	<div class='col-md-7'>
	<div class="collapse navbar-collapse navbar-left" >
				<ul class="nav navbar-nav">
						<form method='post' action='#feature'>
                        <li ><button type='submit' class='btn'  name='today' >Today&nbsp(<?php echo $t ?>)</button>
                        <button type='submit' class='btn'  name='tomorrow' >Tomorrow&nbsp(<?php echo $t1 ?>)</button>
                        <button type='submit' class='btn' name='nextday' ><?php echo $t2 ?></button></li>
						</form>
				</ul><br>
	</div><br><br>
	<div id='feature' >
	<?php
	while($r1=mysqli_fetch_array($result))
	{
	?>
	<br><br>
	<div  class="col-md-5 text-center">
		<figure class='effect-chico'>
			<div class="hi-icon-wrap hi-icon-effect">
				<br><br>
				<img  8width='250' height='200' src="../img/movie/<?php echo $r1['poster'];?>">
			</div>
		</figure>
	</div>
	<div class='col-md-2 '>
	<div class='row'>
	<h2><b><br><div class='text-center'>
	<?php 
	  $a=$r1['name'];
	  $b=$r1['lan'];
	  $i=$r1['id'];
	  echo $a.' ('.$b[0].')';
	  $sq2="Select show_time from showtime st join show_details sd where st.sh_id=sd.sh_id and sd.movie_id='$i'";
	  $re=mysqli_query($con,$sq2);
	?>
	 <br><br><h4>Show Time</h4><br>
	 <?php
	  while($rw2=mysqli_fetch_array($re))
	  {
	?>
	  <form method="POST" action="#Movie">	
		<input type="hidden" name='movi' value="<?php echo $a;?>">
		<?php 
		if(isset($_POST['today']))
		{
	    ?>
		<input type="hidden" name='date' value='<?php echo $t ?>'>
		<?php
		}
		else if(isset($_POST['tomorrow']))
		{
	    ?>
		<input type="hidden" name='date' value='<?php echo $t1 ?>'>		
		<?php
		}
		else if(isset($_POST['nextday']))
		{
	    ?>
		<input type="hidden" name='date' value='<?php echo $t2 ?>'>
		<?php
		}
		?>
		<input type='hidden' name='sh_time' value=<?php echo $rw2['show_time']; ?>>
		<input type='submit' class='btn btn-info' name='book' value='<?php echo $rw2['show_time']; ?>'>
		<h2></h2>
		</form>
	<?php
	}
	}
	?>		
	</div></h2></b>
	</div>
	</div>
	</div>
	</div>
	<?php
	if(isset($_POST['book']) && isset($_POST['date']))
	{
	 $d=$_POST['date'];
     $newDate=date("m-d-Y", strtotime($d));	 
	?>	
	<div id='Movie' style="background-image:url(..\img\movie\Ranam.jpg);">
	<div class='col-md-3'>
	<div class='text-center'>
	<h2>Ticket Reservation</h2>
	</div>
	<h2><font size='4'><form action="" method='POST'>
	<div class='row'>
	<div class='col-md-2'>Movie</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' name='movie' value='<?php echo $_POST['movi']; ?>' disabled>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>Date</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' name='date' value='<?php echo $d; ?>' disabled>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>Show&nbspTime</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' name='shtm' value='<?php echo $_POST['sh_time']; ?>' disabled>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>Seat&nbspType</div>
	<div class='col-md-2 col-md-offset-2'>
     <select name='s_type' id='type'>
        <option>Select Seat Type</option>';
	<?php
     while($rw=mysqli_fetch_array($re5)) 
	 {
	?>
      <option vlaue="<?php echo $rw['st_id']?>"><?php echo $rw['s_type']?></option>
    <?php
     }
    ?>
	 </select>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>Fare</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' id='fare' name='fare' value='' disabled>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>No&nbspof&nbspTickets</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' name='n_t' value=''>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-2'>Total&nbspAmount</div>
	<div class='col-md-2 col-md-offset-2'>
	<input type='text' name='ta' value='' disabled>
	</div>
	</div><br>
	<div class='row'>
	<div class='col-md-offset-3'>
	 <input type='submit' class='btn' value='submit' name='register'> 
	 <input type='reset' class='btn'>
	</div>
	</div>
	</form></h2>
	</div>
	</div>
	<?php
	}
	?>
	
		<div class="social-icon row">
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
	<script src="../style.js"></script>
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>	
  </body>
</html>