<?php
include 'connect.php';
session_start();

$date=date("y-m-d");
$q="Select * from films ";
$r=mysqli_query($con,$q);
if(isset($_POST['login']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];
 $query="select * from logintb where username='$username' and passwrd='$password'";
 $result=mysqli_query($con,$query);
 if(mysqli_num_rows($result)==0)
 {
?>
 <script>
  alert("Username or password do not match");
 </script>
 <?php
 }
 else
 {
	$row=mysqli_fetch_array($result);
	$_SESSION['username']=$row['username'];
	$_SESSION['image']=$row['image'];
	$type=$row['type'];
	if($type=="admin")
	{
		header('location:admin/addashboard.php');
	}
	if($type=="user")
	{
		header('location:user/usrdashboard.php');
	}
	
}
}
?>
<?php
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$phone=$_POST['tel'];
	$age=$_POST['age'];
	$paswrd=$_POST['paswrd'];
	$username=$_POST['username'];
	$allowed=array('jpg','png','jpeg','JPG','PNG','JPEG');
	$info=pathinfo($_FILES['img']['name']);
	$ext=$info['extension']; // get the extension of the file
	$newname=$username.'.'.$ext; 
	$target='C:\xampp\htdocs\bikin\img\user\\'.$newname;
	move_uploaded_file($_FILES['img']['tmp_name'],$target); 
	$q1="select * from regtb where email='$email'";
	$q2="select * from regtb where username='$username'";
	$q3="insert into regtb(fname,lname,dob,email,username,passwrd,gender,phnno,image,age)values('$fname','$lname','$dob','$email','$username','$paswrd','$gender','$phone','$newname',$age)"; 
	$q4="insert into logintb(username,passwrd,email)values('$username','$paswrd','$email')";
	$r1=mysqli_query($con,$q1);
	$r2=mysqli_query($con,$q2);
	
	if($paswrd!=$_POST['cpaswrd'])
	{?>
	  <script>
	   window.alert("Password doesnot match");
	  </script>
	<?php
	}
	else
	{
	 if(mysqli_num_rows($r1)!=0)
	{?>
	  <script>
	   window.alert("email already exist");
	  </script>
	<?php
	} 
	 else if(mysqli_num_rows($r2)!=0)
	{?>
	  <script>
	   window.alert("username already exist");
	  </script>
	<?php
	}
	 else if(!in_array($ext,$allowed))
	{
	?>
	<script>
	   window.alert("Select a valid image file");
	</script>
	<?php
	}
	else
	{
	    mysqli_query($con,$q3);
		mysqli_query($con,$q4);
	?>
	  <script>
	   window.alert("Registration sucessfull");
	  </script>
	<?php
	}
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
    <title>c</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/overwrite.css">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet" />	
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
                    <a class="navbar-brand" href="index.php">CINIMAX</a>
                </div>				
                <div class="collapse navbar-collapse navbar-right">
				<ul class="nav navbar-nav">
                        <li class="active"><a href="#header">Home</a></li>
                        <li><a href="#release">New Releases</a></li>
                        <li><a href="#movies">Upcoming Movies</a></li>
					    <li><form action="" method="POST">
						&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='username' placeholder="User Name" required>
						<input type='password' name='password'  placeholder='Password'required>
						<input type="submit" class="btn-info" name='login' value="LOGIN">
				</form>
				</li>
				</ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	<div class="slider">		
		<div id="about-slider">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators visible-xs">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>

				
				<div class="carousel-inner">
					<div class="item active">						

						<img src="img/5.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<h2>Fully Responsive</h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">								
								<p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
								<div>
										<a href="#register"><button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Register Now</button></a>
									</div>
							</div>
						</div>
				    </div>
					<div class="item">
						<img src="img/3.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
						    <div class='row'>
							<div class="wow fadeInUp col-md-6" data-wow-offset="0" data-wow-delay="1.6s">								
								<div>
										<br><br><br><br><br><a href="#register"><button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Register Now</button></a>
									</div>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<div class='col-md-6'><h2>Features</h2>
								<font size='3' align='left'> DOLBY 7:1 Sound System<br>
									Worlds No. 1 Screen - Harkness clarus 220<br>
									High end sound system and projection<br>
									Night vision surveillance cameras inside the theatre<br>
									Best in town parking area inside the compound</font>
							</div>
							</div>
							</div>
						</div>
				    </div>  <div class="item">
						<img src="img/2.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<h2></h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">								
								<p>Grab your tickets now</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
								<div>
										<a href="#register"><button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Register Now</button></a>
									</div>
							</div>
						</div>
				    </div> 					
				    <div class="item">
						<img src="img/1.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
						
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
								<p>See Infinity War with us</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">								
									<div>
										<a href="#register"><button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Register Now</button></a>
									</div>
							</div>
						</div>
				    </div> 
				</div>
				
				<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i> 
				</a>
				
				<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i> 
				</a>
			</div> <!--/#carousel-slider-->
		</div><!--/#about-slider-->
	</div><!--/#slider-->
	
	<div id="release">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<h3>New Releases</h3>
				</div>
				<?php while($rr=mysqli_fetch_array($r))
				{
				$re=$rr['releasedate'];
				if($re<$date)
				{
					?>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
						<figure class='effect-chico'>
							<div><img src="http://localhost/bikin/img/movie/Ranam.jpg" class="img-circle" width='150' height='150'>	</div>					
							<h2>Ranam(M)</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
						</figure >
						</div>
					</div>
				</div>
				<?php
				}
				}
				?>
			</div>
		</div>
	</div>
	
	<div id="movies">
		<div class="container">
			<div class="text-center">
				<h3>Upcoming Movies</h3>
				<p>Register now to ensure your seats for the upcoming movies</p>
			</div>
			<div class="row">
				<figure class="effect-chico">						
					<div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
						<a href="img/work/1.jpg" class="flipLightBox">
						<img src="img/work/1.jpg" class="img-responsive" alt="">
						</a>						
					</div>
				</figure>
				<figure class="effect-chico">
					<div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
						<a href="img/work/2.jpg" class="flipLightBox">
						<img src="img/work/2.jpg" class="img-responsive" alt="">
						</a>
					</div>
				</figure>	
				<figure class="effect-chico">
					<div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
						<a href="img/work/3.jpg" class="flipLightBox">
						<img src="img/work/3.jpg" class="img-responsive" alt="">
						</a>
					</div>
				</figure>
				<figure class="effect-chico">
					<div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
						<a href="img/work/4.jpg" class="flipLightBox">
						<img src="img/work/4.jpg" class="img-responsive" alt="">
						</a>
					</div>	
				</figure>
			</div>
		</div>
		<div class="movies">
			<div class="container">
				<div class="row">
					<figure class="effect-chico">
						<div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
							<a href="img/work/5.jpg" class="flipLightBox">
							<img src="img/work/5.jpg" class="img-responsive" alt="">
							</a>
						</div>
					</figure>	
					<figure class="effect-chico">
						<div class="col-md-3 col wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
							<a class="flipLightBox" href="img/work/6.jpg" >
							<img class="img-responsive" src="img/work/6.jpg"  alt="">
							</a>
						</div>
					</figure>	
					<figure class="effect-chico">
						<div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
							<a href="img/work/7.jpg" class="flipLightBox">
							<img src="img/work/7.jpg" class="img-responsive" alt="">
							</a>
						</div>
					</figure>	
					<figure class="effect-chico">
						<div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
							<a href="img/work/8.jpg" class="flipLightBox">
							<img src="img/work/8.jpg" class="img-responsive" alt="">
							</a>
						</div>
					</figure>
				</div>
			</div>
		</div>
	</div><!--/#movies-->
	
	
	<div id="register">
		<div class="container">
		<div class="hi-icon-wrap hi-icon-effect">
		 <div class="text-center"><h3>Registration Form<br><br></h3></div>
		  <form action="" method="POST" enctype="multipart/form-data"> 
			 <b><div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">First Name </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="fname" name="fname" placeholder="FIRST NAME" required></div>
			    <div class="col-md-2 col-md-offset-0">Last Name </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="lname" name="lname" placeholder="LAST NAME" required></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Date of Birth </div>
				<div class="col-md-3 col-md-offset-0"><input type="date" name="dob" value='1980-01-01' min="1950-01-01" max="2018-01-01" required></div>
			    <div class="col-md-2 col-md-offset-0">Age </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="age" name="age" placeholder="AGE" pattern='[0-9]*' required></div><br><br>
			  </div>	
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1"> </div>
				<div class="col-md-3 col-md-offset-0"></div>
			    <div class="col-md-2 col-md-offset-0">Gender </div>
				<div class="col-md-3 col-md-offset-0"><input type="radio" name="gender" value="male" checked> Male  <input type="radio" name="gender" value="female"> Female</div><br><br>
			  </div>	
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Email </div>
				<div class="col-md-3 col-md-offset-0"><td><input type="email" id="email" name="email" placeholder="abc@email.com"></div>
			    <div class="col-md-2 col-md-offset-0">Mobile Number </div>
				<div class="col-md-3 col-md-offset-0"><input type="tel" pattern="[7,8,9][0-9]{9}" minlength='10' maxlength='10' id="tel" name="tel" oninvalid="setCustomValidity('please enter a valid telephone number')"placeholder="Phone Number"></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">User Name </div>
				<div class="col-md-3 col-md-offset-0"><input type="text" id="username" name="username" placeholder="username"></div>
			    <div class="col-md-2 col-md-offset-0">Profile Picture </div>
				<div class="col-md-3 col-md-offset-0"><input type="file" accept="image/*" name="img" ></div><br><br>
			  </div>
			  <div clas="row" >			   
			    <div class="col-md-2 col-md-offset-1">Password </div>
				<div class="col-md-3 col-md-offset-0"><input type="password" id="paswrd" name="paswrd" placeholder="PASSWORD" required></div>
			    <div class="col-md-2 col-md-offset-0">Confirm Password </div>
				<div class="col-md-3 col-md-offset-0"><input type="password" id="cpaswrd" name="cpaswrd" placeholder="CONFIRM PASSWORD" required></div><br><br><br>
			  </div>
			  <div clas="row" >
			     <div class="col-md-4 col-md-offset-4"><input type="submit" class='btn-info' name='submit' value='      Register      ' ></div>
				 <div class="col-md-offset-0"><input type="Reset"  class='btn-info' value='      Reset     '></div>
			    </div></b>
			</form>  
			</div>
			</div>
			</div>
			</div><!--/register-area-->			
		</div>
	</div><!--/#register-->
	
		
	
	<footer>
		<div id="contact">
			<div class="container">
				<div class="text-center">
					<h3>Contact Us</h3>
					<p>Fusce fermen tum neque a rutrum varius odio pede</p>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-md-offset- wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
						<h2>Contact us any time</h2>
						<p>In a elit in lorem congue varius. Sed nec arcu.
						Etiam sit amet augue.
						Fusce fermen tum neque a rutrum varius odio pede 
						ullamcorp-er tellus ut dignissim nisi risus non tortor.
						Aliquam mollis neque.</p>				
					</div>				
					
					<div class="col-md-3 col-md-offset-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">
						<h2>Contact Info</h2>
						<ul>
							<li><i class="fa fa-home fa-2x"></i> Office # 38, Suite 54 Elizebth Street, Victoria State Newyork, USA 33026</li><hr>
							<li><i class="fa fa-phone fa-2x"></i> +38 000 129900</li><hr>
							<li><i class="fa fa-envelope fa-2x"></i> info@domain.net</li>
						</ul>
					</div>
						
				</div>
			</div>
		</div><!--/#contact-->					
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
    <script src="js/jquery-2.1.1.min.js"></script>		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
	<script src="js/parallax.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>	
  </body>
</html>