<?php
	include_once "DBconnection.php";
	// $db=new DBconnection();
	class User{
		public $name;
		public $password;
		public $email;
		public $mobile;
		public $email_approved;
		public $phone_approved;
		public $active;
		public $is_admin;
		public $sign_up_date;
		public $security_question;
		public $security_answere;
		function Login($email,$password,$conn){
			$sql = 'SELECT * FROM `tbl_user` where`email`="'.$email.'" AND `password`="'.md5($password).'"' ;
			   $result = $conn->query($sql);
			   if ($result->num_rows > 0) {
			   	 while($row = $result->fetch_assoc()){
			   	 if($row['is_admin']==1){
						$_SESSION['username']=$row['name'];
						$_SESSION['is_admin']=$row['is_admin'];
			   	 		header('location:admin/index.php');
			   	 }else if($row['active']==0 && $row['is_admin']==0){	
					$rtn="Blocked";
						$_SESSION['mobile']=$row['mobile'];
						// $_SESSION['username']=$row['name'];	
						// $_SESSION['is_admin']=$row['is_admin'];	
			   	 }else if($row['active']==1 && $row['is_admin']==0){
						$rtn="Loggedin";
						$_SESSION['username']=$row['name'];	
						$_SESSION['is_admin']=$row['is_admin'];
			   	 	header("Location:index.php");
			   	 }
			   }
			}else{
			   		$rtn="Login Failed";
			   	}

			   	return $rtn;
			   	$conn->close();
		}
		function UserRegister($name,$email,$mobile,$password,$question,$answere,$conn){
				$sql = 'SELECT * FROM `tbl_user` where `email`="'.$email.'"';
				// print_r($sql);
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    	$rtn="Email exist already";
				    }else{
				    	$sq = 'INSERT INTO `tbl_user` (`email`, `name`,`mobile`,`password`,`security_question`,`security_answer`)
						VALUES ("'.$email.'", "'.$name.'", "'.$mobile.'","'.md5($password).'","'.$question.'","'.$answere.'")';

						if ($conn->query($sq) === TRUE) {
						  $rtn ="success";
							// header("Location:login.php");
						} else {
						  $rtn= "Error: " . $sq . "<br>" . $conn->error;
						}

					 }
				
					return $rtn;
					$conn->close();
		}
		function UpdateUser($email,$conn){
			$sql = 'UPDATE `tbl_user` SET `email_approved`= 1, `active`= 1 WHERE `email`="'.$email.'"';

			if ($conn->query($sql) === TRUE) {
			  $rtn="success";
			} else {
			  $rtn="Error";
			}
			 return $rtn;
			$conn->close();
		}
		function UpdateUserStatus($email,$conn){
			$sql = 'UPDATE `tbl_user` SET `phone_approved`= 1, `active`= 1 WHERE `email`="'.$email.'"';

			if ($conn->query($sql) === TRUE) {
			  $rtn="success";
			} else {
			  $rtn="Error";
			}
			 return $rtn;
			$conn->close();
		}
	 }
	

?>