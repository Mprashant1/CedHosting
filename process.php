<?php
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '/home/cedcoss/vendor/autoload.php';
    session_start();
    if(isset($_POST['action'])){
        $otp = rand(1000,9999);
		$_SESSION['otp']=$otp;
        $mobile=$_POST['res'];
        $fields = array(
            "sender_id" => "CEDHSTNG",
            "message" => "Hello, User here is your account verification otp : ".$otp,
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
    if(isset($_POST['value'])){
        $otp = rand(1000,9999);
        $_SESSION['otp']=$otp;
        $email=$_POST['res'];
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
                header('location: verification.php?email='.$email);
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }

    }
?>