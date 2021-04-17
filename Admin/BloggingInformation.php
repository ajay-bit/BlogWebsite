<?php
include "../Authen/adminAuth.php";
$server ="localhost";
$username ="root";
$password ="";
$db = "check";
$con = mysqli_connect($server,$username,$password,$db);
if($con){
// echo "datbase connect";
}
else{
echo"no connection";
die("no connection". mysqli_connect_error());
}
?>
<?php
// fetch data from hidden form
if(isset($_POST['new']) && $_POST['new']==1)
{
echo $id=$_REQUEST['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Dashboard - SB Admin</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		<style type="text/css">
		.img-profile{
		border-radius: 50%;
		}
		body,#profile,.card-body{
		background: -webkit-linear-gradient(to right, #49a09d, #5f2c82);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #49a09d, #5f2c82); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}
		</style>
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Admin Panel</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
			<!-- Navbar Search-->
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<div class="input-group">
					<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
					<div class="input-group-append">
						<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
			<!-- Navbar-->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#">Settings</a>
						<a class="dropdown-item" href="#">Activity Log</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="Logout.php">Logout</a>
					</div>
				</li>
			</ul>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">
							<div class="sb-sidenav-menu-heading">Core</div>
							<a class="nav-link" href="adminPanel.php">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Dashboard
							</a>
							<div class="sb-sidenav-menu-heading">Interface</div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
								Layouts
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="registerShow.php">Register</a>
									<a class="nav-link" href="blogshow.php">Blogging</a>
									<a class="nav-link" href="contactshow.php">Contact</a>
								</nav>
							</div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
								<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
								Pages
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
										Authentication
										<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
									</a>
									<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
										<nav class="sb-sidenav-menu-nested nav">
											<a class="nav-link" href="login.php">Login</a>
											<a class="nav-link" href="register.php">Register</a>
											<a class="nav-link" href="password.php">Forgot Password</a>
										</nav>
									</div>
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
										Error
										<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
									</a>
									<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
										<nav class="sb-sidenav-menu-nested nav">
											<a class="nav-link" href="401.php">401 Page</a>
											<a class="nav-link" href="404.html">404 Page</a>
											<a class="nav-link" href="500.html">500 Page</a>
										</nav>
									</div>
								</nav>
							</div>
						</div>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">Logged in as:</div>
						<form method="post" action="LogOut.php">
							<div class="form">
								<button type="submit" class="btn btn-danger mb-2 my-3">LogOut</button>
							</div>
						</form>
					</div>
				</nav>
			</div>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid my-3">
						<div class="row">
							<div class="col-xl-12 col-md-6 col-sm-12">
								<!-- fetch the data from session -->
								<div class="row">
									<!-- right side data -->
									<div class="col-lg-3 col-md-4d-md-block my-2">
										<div class="card card-left ">
											<div class="card-body">
												<nav class="nav d-md-block d-inline-block">
													<?php
													$query = "SELECT * FROM `image` WHERE `image`.`user_id`='$id'";
													$result = mysqli_query($con, $query);
													while($row = mysqli_fetch_array($result))
													{
													echo '
													<tr>
																<td>
																			<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-profile" />
																</td>
													</tr>
													';
													}

													?>
													<form class="form-group-" method="post" action="">
											<div class="text-center">
												<button type="button" class="btn btn-danger btn-lg btn-block py-2 mt-3">Delete Dp</button>
											</div>
										</form>
												</nav>
											</div>
										</div>
										<form class="form-group-" method="post">
											<div class="text-center">
												<button type="button" class="btn btn-warning btn-lg btn-block py-2 mt-3">Delete All Post</button>
											</div>
										</form>

										<form class="form-group-" method="post" action="blogshow.php">
											<div class="text-center">
												<button type="submit" class="btn btn-success btn-lg btn-block py-2 mt-3">Blog Dashboard</button>
											</div>
										</form>

										<form class="form-group-" method="post" action="registerShow.php">
											<div class="text-center">
												<button type="submit" class="btn btn-primary btn-lg btn-block py-2 mt-3">Register Dasboard</button>
											</div>
										</form>
										
										
									</div>
									<div class="col-lg-8 col-md-4d-md-block my-2">
										<div class="card bg-common card-left">
											<div class="card-body" id="profile">
												<!-- user profile started -->
												<div class="card-body tab-content border-0">
													<!-- actual profile data -->
													<div class="tab-pane active  " id="profile">
														<!-- <h4>Your Profile : <span class="text-warning  font-weight-bold"><?php  echo $name ?></h4></span> -->
														<hr>
														<form>
															<?php
															$id = $_SESSION['bookingUser_id'];
															$query="Select * from blog WHERE `blog`.`bookingUser_id` = $id;";
															$res=mysqli_query($con,$query);
															$count=mysqli_num_rows($res);
															while ($row=mysqli_fetch_array($res)) {
															?>
															<div class="card mb-4">
																<div class="card-header ">
																	<nav class="navbar navbar-light bg-light">
																		<div class="text-align-left"><h4><?php  echo $row['title']; ?></h4></div>
																		<form class="form-inline">
																			<div class="justify-content-end text-justify"> <h5>Blog Post on  : <?php  echo $row['blog_date']; ?></h5></div>
																			
																		</form>
																	</nav>
																	<!--  -->
																	<!--  -->
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-lg-6 col-md-6 col-sm-12">
																			<div class="mb-4 mr-4">
																				<?php
																				
																				
																				echo '
																				
																				
																				<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" />
																				
																				';
																				
																				?>
																			</div>
																			<h6> Post At : <?php  echo $row['blog_time']; ?></h6>
																		</div>
																		<div class="col-lg-6 col-md-6 col-sm-12 justify-content-end">
																			
																			<!-- <h2>Post :</h2><div class="d-inline-block text-truncate"></p> -->
																			<p class="text-justify text-nowrap" >
																				<h4>Your Post :</h4><?php  echo $row['Post']; ?>
																			</p>
																			<br>
																			<br>
																			<h4>Your Self : </h4> <?php echo $row['About']; ?>
																		</div>
																	</div>
																</div>
															</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</main>
					<footer class="py-4 bg-light mt-auto">
						<div class="container-fluid">
							<div class="d-flex align-items-center justify-content-between small">
								<div class="text-muted">Copyright &copy; sharma 2020</div>
								<div>
									<a href="#">Privacy Policy</a>
									&middot;
									<a href="#">Terms &amp; Conditions</a>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
			<script src="js/scripts.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
			<script src="assets/demo/chart-area-demo.js"></script>
			<script src="assets/demo/chart-bar-demo.js"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
			<script src="assets/demo/datatables-demo.js"></script>
		</body>
	</html>