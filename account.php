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
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
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
	// if(isset($_SESSION['username'])){
	// 	$check=$_SESSION['is_admin'];
	// 	if($check==0){
	// 		header("Location:index.php");
	// 	}else{
	// 		header("Location:admin/index.php");
	// 	}
	// }else{
	// 	header("Location:login.php");
	// }
	include_once "Classes/DBconnection.php";
	$db=new DBconnection();
	include_once "Classes/User.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '/home/cedcoss/vendor/autoload.php';
?>
<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['phone'];
		$_SESSION['mobile']=$mobile;
		$password=$_POST['password'];
		$cnfm_password=$_POST['cnfm_password'];
		$question=$_POST['ques'];
		$answere=$_POST['ans'];
		if($password==$cnfm_password){
			$user=new User();
			$sql=$user->UserRegister($name,$email,$mobile,$password,$question,$answere,$db->conn);
			if($sql=="success"){
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
					    header('location: verification.php?email='.$email.'&mobile='.$mobile.'&f=1');
					} catch (Exception $e) {
					    echo "Mailer Error: " . $mail->ErrorInfo;
					}

					


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
                    "authorization: wvxP4dnTmGqELHh9XD0Brs5NAQj6IzOaZFMRiefo3V2tYKUJWcMQOYuR73tojiwFfzrECxIyTd02Bcas",
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
			}
			
			
?>
		<div class="content">
		<!-- registration -->
		<div class="main-1">
		<div class="container">
		<div class="register">
		<form action="" method="POST">
		<div class="register-top-grid">
		<h3>personal information</h3>
		<div>
		<span> Name<label>*</label></span>
		<input type="text" name="name" class="lugwt" required onkeydown="return alphaonly(event);">
		</div>
		<div>
		<span>Phone No.<label>*</label></span>
		<input type="text" name="phone" id="mobile" maxlength="10" class="lugwt" onkeydown="return onlynumber(event);" required>
		</div>
		<div>
		<span>Email Address<label>*</label></span>
		<input type="email" name="email" id="email" class="lugwt" onkeydown="return alphaonly3(event);" required >
		</div>
		<!-- <div>
		<span>Security Question<label>*</label></span>
		<input type="text" name="ques" >
		</div> -->
		<div>
		<span>Security Question<label>*</label></span>
		<select style="width:524px;height:37px; " name="ques" required>

		<option value="What was your childhood nickname?">What was your childhood nickname?</option>
		<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
		<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
		<option value="What was your dream job as a child?">What was your dream job as a child?</option>
		<option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
		</select>
		</div>
		<div>
		<span>Answer<label>*</label></span>
		<input type="text" class="lugwt" name="ans" required pattern="^[a-zA-Z0-9]+$"
		onkeydown="return alphaonly2(event);">
		</div>
		<div class="clearfix"> </div>
		<a class="news-letter" href="#">

		</a>
		</div>
		<div class="register-bottom-grid">
		<h3>login information</h3>
		<div>
		<span>Password<label>*</label></span>
		<input type="password" name="password" class="lugwt" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" minlength="8" maxlength="16" required>
		</div>
		<div>
		<span>Confirm Password<label>*</label></span>
		<input type="password" name="cnfm_password" class="lugwt" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required minlength="8" maxlength="16" >
		</div>
		</div>

		<div class="clearfix"> </div>
		<div class="register-but">

		<input type="submit" value="submit" name="submit" class="a">
		<div class="clearfix"> </div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<!-- registration -->

		</div>
		<script>
		var count_mob=0;
		var count=0;
		var temp=0;
		var i=0;
		var i2=0;
		var count2=0;
		function alphaonly(button) {
		var code = button.which;
		if(count>0 && code==32 && (i2==0 || i2==1)){
		count=0;
		i2++;
		return true;

		}
		console.log(button.which);

		if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code==09)) {
		count++;
		return true;

		}
		else{
		return false;
		}

		}
		function onlynumber(button) {

		var code = button.which;

		if (code > 31 && (code < 48 || code > 57)&& (code < 96 || code > 105))
		return false;
		return true;
		var myval = $(this).val();

		}
		function alphaonly3(button) {
		var code = button.which;

		if(count>0 && code==190){
		console.log(count);
		count=0;
		return true;

		}
		console.log(button.which);

		if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code==09)||(code > 47 && code < 58)||code==37||code==39) {
		count++;
		console.log(count);
		return true;

		}
		// else if(code > 47 || code < 58){
		// count++;
		// return true;
		// }

		else{
		return false;
		}
		}

		function alphaonly2(button) {
		console.log(button.which);

		var code = button.which;
		if(count>0 && code==32){
		console.log('sjnd');
		count=0;
		return true;
		}
		else if(code==32){
		return false;
		}
		else{
		count++;
		return true;
		}
		}



$("#mobile").bind("keyup", function (e) {

mobile=$("#mobile").val();

var fchar=$("#mobile").val().substr(0, 1);
var schar=$("#mobile").val().substr(1,1);


if(fchar==0) {
$('#mobile').attr('maxlength','11');
if(schar==0)
{
$("#mobile").val(0);
if(fchar=="")
{
$("#mobile").val("");
}

}
} else {
$('#mobile').attr('maxlength','10');
}
if(mobile.length>9){
for(i=0;i<=mobile.length;i++){

if(mobile.substr(i,1)==mobile.substr(i+1,1)){
count2++;
console.log(count2);
if(count2==9){
count2=0;
alert('Invalid Phone no.');
$("#mobile").val("");
mobile='';
console.log(mobile.length);
}

}
else if(mobile.substr(i,1)!=mobile.substr(i+1,1)){
count2=0;
}
}
}
});
$("#email").bind("keypress", function (e) {


var keyCode = e.which ? e.which : e.keyCode
if (!(keyCode==46) && !(keyCode >= 48 && keyCode <= 57) && !(keyCode >= 64 && keyCode <= 90) && !(keyCode >= 97 && keyCode <= 122)) {
//console.log(keycode);
return false;
}



});
$('.lugwt').on("cut copy paste drag drop",function(e) {
e.preventDefault();
});
</script>
<!-- login -->
<?php require "footer.php" ?>





Type a message
