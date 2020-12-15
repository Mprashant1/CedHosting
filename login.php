
<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
<!--script-->
</head>
<body>
	<?php
		session_start();
		include "header.php";
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		require '/home/cedcoss/vendor/autoload.php';
		include_once "Classes/DBconnection.php";
		$db=new DBconnection();
		include_once "Classes/User.php";
		// if(isset($_SESSION['username'])){
		// 	$check=$_SESSION['is_admin'];
		// 	if($check==1){
		// 		header("Location:admin/index.php");
		// 	}else{
		// 		header("Location:account.php");
		// 	}
		// }
	?>
	<?php
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
			$user=new User();
			$sql=$user->Login($email,$password,$db->conn);
			if($sql=="Blocked"){
				$otp = rand(1000,9999);
				$_SESSION['otp']=$otp;
				$mail = new PHPMailer();
				try {                                       
					     $mail->isSMTP(true);                                             
					    $mail->Host       = 'smtp.gmail.com';                     
					    $mail->SMTPAuth   = true;                              
					    $mail->Username   = 'mp8888719@gmail.com';                  
					    $mail->Password   = 'PrAshaNt@1998';                         
					    $mail->SMTPSecure = 'tls';                               
					    $mail->Port       = 587;   
					  
					    $mail->setFrom('pm8826336395@gmail.com', 'CedHosting');            
					    $mail->addAddress($email); 
					    $mail->addAddress($email, $name); 
					       
					    $mail->isHTML(true);                                   
					    $mail->Subject = 'Account Verification'; 
					    $mail->Body    = 'Hi User,Here is your otp for account verification'.$otp; 
					    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
					    $mail->send();
					    header('location: verification.php?email='.$email.'&mobile='.$_SESSION['mobile'].'&f=1');
					} catch (Exception $e) {
					    echo "Mailer Error: " . $mail->ErrorInfo;
					}
					


					$mobile=$_SESSION['mobile'];
					$fields = array(
	
                    "sender_id" => "CEDHSTNG",
                    "message" => "Hello, ".$name." here is your account verification otp : ".$otp,
                    "language" => "english",
                    "route" => "p",
                    "numbers" => "$mobile",
                );

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: zHgk1eTm6PSd2OjLQpcwD9GrU38XICW7M0VnRxBatNbKoJlqEhA7aPeD8it9jFqNcdyKozsYfwkIr3xm",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                }				
									
								}
		}
?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"  title="match doesnot found" required="required" name="email"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password"  required="required" name="password"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" value="Login" name="submit">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
				<?php
			      include "footer.php";

		        ?>	
</body>
</html>