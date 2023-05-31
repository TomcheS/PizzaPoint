<!--Strana za meni kade sto korisnicite mozat da gi vidat site artikli i od kade sto mozat da pristapat do sekoj artikl posebno-->

<?php 
    include("db_connect.php");
	session_start();
	if(!isset($_SERVER['HTTP_REFERER']) && ($_SESSION['role']=='3')){
		header('refresh:0;admin.php');
		exit;
	}
	if(!isset($_SERVER['HTTP_REFERER']) && ($_SESSION['role']=='2')){
		header('refresh:0;employee.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
     <!-- Site Metas -->
    <title>Pizza Point Delivery</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="images/logo1.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php
                            if(!isset($_SESSION['user'])){
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            }
							else{
								echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
							}
							if(isset($_SESSION['cart'])){
								echo '<li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>';
							}
                        ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Menu</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End -->
	
	<!-- Start Menu -->

	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<?php
						if(isset($_GET['productCategory'])){
							echo '<h2>Menu / '.$_GET['productCategory'].'</h2>';
						}
						if(!isset($_GET['productCategory'])){
							echo '<h2>Menu / All</h2>';
						}
						?>
					</div>
				</div>
			</div>
			
		<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills btn btn-light" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<?php
                        $query="select distinct productCategory from product";
                        $result=mysqli_query($conn,$query);
						echo  '<a class="nav-link" href="menu.php?" aria-selected="true">All</a>';

                        while($row=mysqli_fetch_object($result))
                        {
                            echo  '<a class="nav-link" href="menu.php?productCategory='.$row->productCategory.'" aria-selected="true">'.$row->productCategory.'</a>';
				        }
						
                    ?>
					
					
					
					</div>
				</div>
				
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
							<?php
							if(isset($_GET['productCategory']))
     							{
        							$category=$_GET['productCategory'];
        							$query='select * from product where productCategory="'.$category.'"';
        							$result=mysqli_query($conn,$query);
        							while($row=mysqli_fetch_object($result))
									{
										echo '<div class="col-lg-4 col-md-6 special-grid">
											<div class="gallery-single fix">
											<img src="images/'.$row->productPhoto.'" class="img-fluid" alt="Image">
												<div class="why-text">
												<h4>'.$row->productName.'</h4>
												<p>'.$row->productDesc.'</p>
												<div class="d-flex align-items-start">
													<h5>'.$row->productPrice.' |</h5>
													<h5><a class="text-white" href="single.php?productID='.$row->productID.'">| <img src="images/buy.png" alt="" /></a></h5>
												</div>
												
											</div>
										</div>
									</div>';
										
							
                             		}
								}

								if(!isset($_GET['productCategory']))
     							{
        							$query='select * from product';
        							$result=mysqli_query($conn,$query);
        							while($row=mysqli_fetch_object($result))
									{
										echo '<div class="col-lg-4 col-md-6 special-grid">
											<div class="gallery-single fix">
											<img src="images/'.$row->productPhoto.'" class="img-fluid" alt="Image">
												<div class="why-text">
												<h4>'.$row->productName.'</h4>
												<p>'.$row->productDesc.'</p>
												<div class="d-flex align-items-start">
													<h5>'.$row->productPrice.' |</h5>
													<h5><a class="text-white" href="single.php?productID='.$row->productID.'">| <img src="images/buy.png" alt="" /></a></h5>
												</div>
												
											</div>
										</div>
									</div>';
										
							
                             		}
								}
                			?>
							</div>							
						</div>
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	

	
	
<!--  Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Major Cede Filiposki, Gostivar, Macedonia, 1230</p>
					<p class="lead"><a href="#">070 700 582</a></p>
					<p><a href="#"> pizzapointgostivar@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Mon-Wed : </span>10:00 - 00:00</p>
					<p><span class="text-color">Fri-Sat :</span> 10:00 - 00:00</p>
					<p><span class="text-color">Sunday :</span> 10:00 - 00:00</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Follow Us </h3>
					<ul class="list-inline f-social">	
						<li class="list-inline-item"><a href="https://www.facebook.com/pizzapointgostivari/about"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/pizzapoint_delivery/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Pizza Point Delivery</a> 
					
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
		
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>