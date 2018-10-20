<?php
include 'connect.php';
session_start();
if(!isset($_SESSION)||!($_SESSION['username']=='admin'))
  {
	  header('location:../index.php');
  }
  $q1="select * from films where films.id in(select movie_id from show_details) ";
  $q2="select * from films where films.id not in(select movie_id from show_details) ";
  $result=mysqli_query($con,$q1);
  $result2=mysqli_query($con,$q2);
  if(isset($_POST['add']))
  {
	$name=$_POST['mname'];
	$dir=$_POST['dir'];
	$prodr=$_POST['pro'];
	$prdn=$_POST['prod'];
	$cast=$_POST['cast'];
	$des=$_POST['des'];
	$redate=$_POST['release'];
	$lan=$_POST['lan'];
	$sq1="INSERT INTO `films`(`name`, `director`, `producer`, `production`, `casting`, `releasedate`, `des`, `lan`) values ('$name','$dir','$prodr','$prdn','$cast','$redate','$des','$lan')";
	mysqli_query($con,$sq1)or die(mysqli_error($con));
	$allowed=array('jpg','png','jpeg','JPG','PNG','JPEG');
	$info=pathinfo($_FILES['pic']['name']);
	$ext=$info['extension']; // get the extension of the file
	$pname=$name.'.'.$ext; 
	$target='C:/xampp/htdocs/bikin/img/movie//'.$pname;
	$sq2="update films  set poster='$pname' where name='$name'";
	move_uploaded_file($_FILES['pic']['tmp_name'],$target); 
	mysqli_query($con,$sq2);
	header('location:addashboard.php');
  } 
  if(isset($_POST['btn']))
  {
	$mve=$_POST['movi'];
	$q1="select * from films where name='$mve'";
	$reslt=mysqli_query($con,$q1);
	$r1=mysqli_fetch_array($reslt);
	$a=$r1['lan'];
	$b=$r1['id'];
	$sq3="Select show_time from showtime st join show_details sd where st.sh_id=sd.sh_id and sd.movie_id='$b'";
	$r3=mysqli_query($con,$sq3)or die(mysqli_error());
	$sq5="Select * from stills where m_name='$mve'";
	$r4=mysqli_query($con,$sq5)or die(mysqli_error());
  }
  if(isset($_POST['delmv']))
  { 
    ?>
	  <script>
	  if(confirm("Do you want to delete this movie"))
	  {
		
		window.location("#delmovie?a=<?php echo $_POST['movi']; ?>");
	  }
	  else
	  {
		window.location("addashboard.php");
	  }		
	  </script>
	  <?php 
  }
  if(isset($_POST['update']))
  {
	$b=$_POST['movi'];
	$sq6="insert into stills (m_name) values ('$b')";
	mysqli_query($con,$sq6);
	for($i=1;$i<=6;$i++)
	{
	   $a='img'.$i;
	   $c='image'.$i;
	   $info=pathinfo($_FILES[$a]['name']);
	   $ext=$info['extension']; // get the extension of the file
	   $newname=$b.$i.'.'.$ext; 
	   $target='..\img\movie\stills\\'.$newname;
	   move_uploaded_file($_FILES[$a]['tmp_name'],$target);
	   switch($i)
	   {
		   
		   case 1:
			 $sq7="update stills set image1='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7)or die(mysqli_error($con));
			 break;
		   case 2:
			 $sq7="update stills set image2='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7);
			 break;
		   case 3:
			 $sq7="update stills set image3='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7);
			 break;
		   case 4:
			 $sq7="update stills set image4='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7);
			 break;
		   case 5:
			 $sq7="update stills set image5='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7);
			 break;
		   case 6:
			 $sq7="update stills set image6='newname' where m_name='$newname'";
			 mysqli_query($con,$sq7);
			 break;
	   }
	}
	if(isset($_GET['a']))
	{
		$a=$_GET['a'];
		$sq4="delete from films where name='$a'";
		mysqli_query($con,$sq4);
	}

  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Home</title>

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
                        <li><a href="">Movie</a>
						<li><a href="user.php">User List</a></li>
					    <li><a href="screen.php">Screen</a></li>
						<li><a href=""><img src="../img/user/admin.jpg" height='30' width='30'class="img-circle" ></a></li>
						<li><a href="../logout.php"><button class="btn-info">logout</button></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	
<?php if(!isset($_POST['admve'])&&!isset($_POST['btn'])&&!isset($_POST['adstill'])){ ?>	
	<div id="feature">
		<div class="container">
			<div class="row">
				<div class='col-md-12'>
				<div class="text-center">
					<br><br><br><br><br><h3>Now Showing</h3>
					<form action='#addmovie' method='post'><input type='submit' name='admve' class="btn btn-link"  value='Add Movie'></form></div>
			<?php 
				while($row=mysqli_fetch_array($result))
				{
				?>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<figure class='effect-chico'>
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
						    <br><br>
							<img  width='100' height='90' src="../img/movie/<?php echo $row['poster'];?>">
							<?php $a=$row['name'];?>
							<form method="POST" action="#Movie">	
							<input type="hidden" name='movi' value="<?php echo $a;?>">
							<h2><input type="submit" class="btn btn_default"  name='btn' value="<?php echo $row['name'] ?>"></h2>
							</form>
						</div>
					</div>
					</figure>
				</div>
				<?php }?>
				</div>
			</div>
		</div>
	</div>
	
	<div id="feature">
		<div class="container">
			<div class="row">
			<div class='col-md-12'>
				<div class="text-center">
					<br><br><h3>Coming Soon</h3>
					</div>
			<?php 
				while($row=mysqli_fetch_array($result2))
				{
				?>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<figure class='effect-chico'>
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
						    <div class="img-wrap">
							<?php $a=$row['name'];?>
							</div><br><br>
							<img  width='100' height='90' src="../img/movie/<?php echo $row['poster'];?>">
							<form method="POST" action="#Movie">	
							<input type="hidden" name='movi' value="<?php echo $a;?>">
							<h2><input type="submit" class="btn btn_default"  name='btn' value="<?php echo $row['name'] ?>"></h2>
							</form>
						</div>
					</div>
					</figure>
				</div>
				<?php }?>
			</div>
			</div>
		</div>
	</div>
<?php } ?>
	<div id="addmovie">
	<?php
		if(isset($_POST['admve'])&&!isset($_POST['adstill']))
		{
	?>  <br><br><br><br><br>
		 <form action='addashboard.php' method='post'><input type='submit' class="btn btn-link"  value='Go back'></form>
		<br><br><br>		
		<div class="col-md-12 col-md-offset-0">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <div class="text-center"><h2>Add Movie Form<br><br></h2></div>
		  <form action="" method="Post" enctype="multipart/form-data"> 
			 <b> <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Name </div>
				<div class="col-md-3 col-md-offset-"><input type='text' name='mname' required></div>
			    <div class="col-md-2 col-md-offset-0">Director </div>
				<div class="col-md-3 col-md-offset-0"><input type='text' name='dir'  required></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Producer</div>
				<div class="col-md-3 col-md-offset-0"><input type='text' name='pro'  required></div>
			    <div class="col-md-2 col-md-offset-0">Prodution </div>
				<div class="col-md-3 col-md-offset-0"><input type='text' name='prod'  required><br></div><br><br>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Starring </div>
				<div class="col-md-3 col-md-offset-0"><textarea name='cast' required 	></textarea></div>
			    <div class="col-md-2 col-md-offset-0">Description </div>
				<div class="col-md-3 col-md-offset-0"><textarea name='des'  required></textarea><br></div><br><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1"> Releasing Date</div>
				<div class="col-md-3 col-md-offset-0"><input type='date' name='release'  required></div>
			    <div class="col-md-2 col-md-offset-0"> Language</div> 
				<div class="col-md-3 col-md-offset-0"><input type='text' name='lan'  required></div><br><br><br>
			  </div>
			  
			  <div clas="row" >			   
				 <div class="col-md-2 col-md-offset-1">Poster</div>
				 <div class="col-md-3 col-md-offset-0"><input type='file' name='pic'  required></div>

				<br><br>
			  </div>
			  <div clas="row" >
			     <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='add' value='        Save      ' ></div>
				 <div class="col-md-offset-0"><input type="Reset"  class='btn-info' value='      Reset     '></div>
			    </div></b>
			</form>
		</div></div>
		<?php 
		}
		?>
		
		
	<div id="Movie">
		 <?php if(isset($_POST['btn']))
		 { 
		 ?>
		<br><br><br><br><br>		
		<form action='addashboard.php' method='post'><input type='submit' class="btn btn-link"  value='Go back'></form>
		<br><br><br>
		<div class="container">
		 <div class="text-center"><br></h3></div>
		 <div class="col-md-3 col-md-offset-0">
		 <div class="hi-icon-wrap hi-icon-effect">
		 <figure class='effect-chico'>
		 <br><img width='240' height='270' src="../img/movie/<?php echo $r1['poster'];?>" >
		 </figure>
		 </div>
		 </div>
		 <div class="col-md-6 col-md-offset-0">
		 <div class="hi-icon-wrap hi-icon-effect">
		<div class='row'>
		    <div class="col-md-5 col-md-offset-3"><h2 align='center'><b><?php echo $r1['name'].' ('.$a[0].')' ?></b></h2></div>
			<form action='' method='post'>
							<input type="hidden" name='movi' value="<?php echo $r1['name'];?>">
							<button type="submit" class="close" name='delmv' data-dismiss="modal" label="Close"><span>&times;</span></button>
							</form><br>	 
		</div>
		<br><div clas="row" >
		    <div class="col-md-3">Releasing on : </div>
			<div class="col-md-offset-3"><?php echo $r1['releasedate']?></div><br>
		</div>	 
		<div clas="row" >
			<div class="col-md-3">Directed by : </div>
			<div class="col-md-offset-3"><?php echo $r1['director']?></div><br>
		</div>	 
		<div clas="row" >
			<div class="col-md-3">Produced by : </div>
			<div class="col-md-offset-3"><?php echo $r1['producer']?></div><br>
		</div>	 
		<div clas="row" >
			<div class="col-md-3">Casting : </div>
			<div class="col-md-offset-3"><?php echo $r1['casting']?></div><br>
		</div>	 
		</div>
		</div>
		<div class='col-md-3'>
		<div class='hi-icon-wrap hi-icon-effect'>
		<div class='text-center'>
		<h2> Show Details </h2>
		</div>
		<?php while($r=mysqli_fetch_array($r3))
		{
		?>
		<div class='row'>
		<div class='col-md-1'>
		</div>
		<div class='col-md-2'>
		<?php echo $r['show_time'];?>
		</div>			 
		</div>
		<?php }?>
		</div>
		</div>
		</div>
		 
		 <div class="hi-icon-wrap hi-icon-effect">
		 <div class='row'>
		 <div class="col-md-5 col-md-offset-3">
		 <h2>&nbsp&nbsp&nbsp&nbsp&nbsp Summary<br></h2></div></div>
		 <p><div class='row'>
		 <div class='col-md-4'></div><?php echo $r1['des'];?>
		 </p><div class='col-md-2'></div>
		 </div>
		 </div><br>
		 <div class="hi-icon-wrap hi-icon-effect">
		 <div clas="row" >
		 <h2>Stills</h2><br>
		 </div>
		 <div class='container'>
		 <div class='row'>
		 <?php 
		 if($r=mysqli_fetch_array($r4))
		 { 
		  for($x=1;$x<=6;$x++)
		  {
			  if(isset($r[$x]))
			  {
	     ?>
		 
		 <figure class="effect-chico">
			<div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
			<a href="../img/movie/stills/<?php echo $r[$x];?>" class="flipLightBox">
			<img src="../img/movie/stills/<?php echo $r[$x];?>" class="img-responsive" alt="">
			</a>
			</div>
		 </figure>
		  <?php 
			 }
		   }
		 }
		 else
		 {
		 ?>
		<form action="#Addstill" method="Post">
		   <input type='hidden' name='movie' value='<?php echo $r1['name']; ?>'>
		   <input type="submit" name='adstill' class="btn btn-link" style="pixel:50px; font-size:13px "value='Add Stills'>
		</form>
		 <?php
		 }
		 ?>
		</div>
		</div>
		</div>
		 <?php
		 }
	?>
	<div id='delmovie'>
	</div>
	<?php  
	if(isset($_POST['adstill']))
	{
	?>
	<div id="Addstill">
		<br><br><br><br><br>
		<form action='#Movie' method='post'><input type='submit' class="btn btn-link"  value='Go back'></form>
		<div class="container">
		<div class="hi-icon-wrap hi-icon-effect">
		 <div class="text-center"><h2>Add Stills<br><br></h2></div>
		  <form action="" method="POST" enctype="multipart/form-data"> 
			 <input type='hidden' name='movi' value='<?php echo $_POST['movie']; ?>'>
			 <b><div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Image1 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' name='img1' accept="image/*" required></div>
			    <div class="col-md-2 col-md-offset-1">Image2 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' accept="image/*" name='img2'  required></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Image3 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' name='img3' accept="image/*" required></div>
			    <div class="col-md-2 col-md-offset-1">Image4 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' accept="image/*" name='img4'  required></div><br><br>
			  </div>	
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Image5 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' name='img5' accept="image/*" required></div>
			    <div class="col-md-2 col-md-offset-1">Image6 </div>
				<div class="col-md-3 col-md-offset-0"><input type='file' accept="image/*" name='img6'  required></div><br><br>
			  </div>
			  <div clas="row" >
			     <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='update' value='       Add       ' ></div>
			     </form>
				 <div class="col-md-offset-0"><input  type='reset' class='btn-info' value='	 Reset      '></div>
			    </div></b>
	<?php
	}
	?>		  
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