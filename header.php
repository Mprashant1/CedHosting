<?php
	if(isset($_SESSION)){}else{session_start();} 
?>
<!---header--->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"><img src="images/logo1.png" alt="logo" style="margin-top: -54px;"></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li class="active"><a href="about.php">About</a></li>
								<li><a href="blog.php">Services</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
									<?php
									include_once "Classes/DBconnection.php";
									$db=new DBconnection();
									include_once "Classes/Product.php";
									$prod=new Product();
									$result = $prod->ShowCategory($db->conn);
									foreach ($result as $key => $value) {
										echo "<li><a href=".$value['link'].">".$value['prod_name']."</a></li>";
									}
									?>
					
									</ul>			
								</li>
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="faq.php">Blog</a></li>
								<?php
									if(isset($_SESSION['username'])){
										// Echo $_SESSION['username'];
										$check=$_SESSION['is_admin'];
										if($check==0){
										echo "<li><a href='logout.php'>LogOut</a></li>";
											
										}
									}else{
										echo "<li><a href='login.php'>Login</a></li>";
									}
								?>
								<li><a href="codes.php"><ion-icon name="cart-outline"></ion-icon></a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>	
	<!---header--->