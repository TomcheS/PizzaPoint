<!-- Del od admin i employee panelot kade sto moze da se vidat tekovnite naracki i da se upravuva so niv -->

<?php 
    include("db_connect.php");
	session_start();
	if(!isset($_SERVER['HTTP_REFERER']) && ($_SESSION['role']=='1')){
		header('refresh:0;index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    
 
     
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
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start  -->
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
                    <?php
                            if($_SESSION['role']=='2'){
                                echo '<li class="nav-item"><a class="nav-link" href="employee.php">Home</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>';
                            }
							if($_SESSION['role']=='3'){
                                echo '<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="menuadmin.php">Menu</a></li>';
						        echo '<li class="nav-item"><a class="nav-link" href="employeeadmin.php">Employees</a></li>';
						        echo '<li class="nav-item active"><a class="nav-link" href="orders.php">Orders</a></li>';
                            }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start  -->
    
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
				</div>
			</div>
		</div>
	</div>
	<!-- End -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
                        <h2>Orders Panel</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
            <div class="row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Content</th>
                                    <th>Order Price</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Options</th>
                                </tr>
                                <?php
                                    $query="select * from orderlist";
                                    $result=mysqli_query($conn, $query);
                                    while($row=mysqli_fetch_object($result)){
                                        echo '
                                        <tr>
                                            <td>'.$row->orderID.'</td>
                                            <td>'.$row->orderDate.'</td>
                                            <td>'.$row->orderText.'</td>
                                            <td>'.$row->orderPrice.'</td>
                                            <td>'.$row->orderAddress.'</td>
                                            <td>'.$row->phone.'</td>
                                            <td><a href="removeorder.php?orderID='.$row->orderID.'">Remove</a></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </table>
                            <br><br>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
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