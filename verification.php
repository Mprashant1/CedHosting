<!--
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
<script src="js/custom.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<?php
    session_start();
    include "header.php";
    include_once "Classes/DBconnection.php";
    include_once "Classes/User.php";
    if(isset($GET['f'])){

    }
   
?>
<!---fonts-->
<?php 
if(isset($_GET['email'])){
    $email=$_GET['email'];
    if(isset($_POST['emailotp'])){
    $otp=$_POST['emailot'];
    if($_SESSION['otp']==$otp){
    unset($_SESSION['otp']);
        $user=new User();
        $db=new DBconnection();
        $sql=$user->UpdateUser($email,$db->conn);
        if($sql=="success"){
        echo '<script>alert("You have verified pls login.");
                window.location.replace("login.php");
            </script>';
    }
        else{
        echo '<script>alert("Some error in updating details.");</script>';
    }
        
}else{
    echo '<script>alert("You entered wrong otp");</script>';
    return;
}
}
}
if(isset($_GET['mobile'])){
    $mobile=$_GET['mobile'];
    if(isset($_POST['mobileotp'])){
    $otp=$_POST['mobot'];
    if($_SESSION['otp']==$otp){
    unset($_SESSION['otp']);
        $user=new User();
        $db=new DBconnection();
        $sq=$user->UpdateUserStatus($email,$db->conn);
        if($sq=="success"){
        echo '<script>alert("You have verified pls login.");
                window.location.replace("login.php");
            </script>';
    }
        else{
        echo '<script>alert("Some error in updating details.");</script>';
    }
        
}else{
    echo '<script>alert("You entered wrong otp");</script>';
    return;
}
}
}?>
<div class="content">
                <div class="main-1">
                    <div class="container">
                    
                    <script>
                                          
                                          var timeleft = 30;
                                          
                                          var downloadTimer = setInterval(function(){
                                              // document.getElementById('mobileotp1').style.display="none";
                                              document.getElementById("timer").innerHTML = timeleft;
                                          if(timeleft < 0){
                                              clearInterval(downloadTimer);
                                              document.getElementById("timer").style.display="none";
                                              document.getElementById("msg").style.display="none";
                                              // document.getElementById("msg").innerHTML = "Finished";
                                              document.getElementById('mobileotp1').style.display="inline-block";
                                              document.getElementById('emailotp1').style.display="inline-block";
                                          }
                                          timeleft -= 1;
                                          }, 1000);
                                        
                                    </script>
                        <div class="login-page">
                            <div class="account_grid">
                            
                                <h3 class="mb-3">Verification</h3>
                                <div class="container">
                                <div id="msg">Resend OTP after :<p id="timer" style="display:inline-block;"></p></div>
                                <div class="col-md-6 login-right">
                                    
                                    <p>Email verification</p>

                                    <form action=" " method="post">
                                      <div>
                                        <span>Email Address<label>*</label></span>
                                        <label for="email"><?php echo $email;?></label> 
                                      </div>
                                       <div>
                                        <span>OTP<label>*</label></span>
                                        <input type="text" name="emailot"> 
                                      </div>
                                      <input type="submit" value="verify" name="emailotp">
                                      <input type="button" value="Resend" name="emailotp1" id="emailotp1" style="display:none;">
                                    </form>
                                </div>

                                <div class="col-md-6 login-right">
                                   
                                    <p>Phone verification</p>

                                    <form action=" " method="post">
                                      <div>
                                        <span>Phone<label>*</label></span>
                                        <label for="mobile"><?php echo $mobile;?></label> 
                                      </div>
                                      <div>
                                        <span>OTP<label>*</label></span>
                                        <input type="text" name="mobot"> 
                                      </div>
                                      <input type="submit" value="verify" name="mobileotp">
                                      <input type="button" value="Resend" name="mobileotp1" id="mobileotp1" style="display:none;">
                                    </form>
                                </div>
                                </div>  
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
 include "footer.php";
 ?>