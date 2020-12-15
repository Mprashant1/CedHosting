<?php 
session_start();
// if (!isset($_SESSION['username'])) {
//   header("location: ../login.php");
// } elseif(isset($_SESSION['username'])){
//     if($_SESSION['is_admin'] == '0') {
//         header("location:../index.php");
// 	}
// }
if(isset($_SESSION['username'])){
 if(isset($_SESSION['is_admin'])){
	 if($_SESSION['is_admin']=='1'){
		
	 }else{
		 header("location: admin/index.php");
		 echo $_SESSION['is_admin'];
	 }
 }

}else{
	header("location:../login.php");
}
require "header.php";
include_once "../Classes/Product.php";
include_once "../Classes/DBconnection.php";
$db=new DBconnection();
$product=new Product();
if(isset($_POST['add_prod'])){
	// echo $_POST['parentid']." ".$_POST["product_name"];
	$details = array('webspace'=>$_POST['webspace'],
					'bandwidth'=>$_POST['bandwidth'],
					'free_domain'=>$_POST['freedomain'],
					'support'=>$_POST['support'],
					'mailbox'=>$_POST['mailbox'],
				);
	$details1=json_encode($details);
	// echo $details1;
				//echo $check." ".$_POST['product_name']." ".$link." ".$_POST['parentid'];
				$sq=$product->addpro($_POST['parentid'],$_POST['product_name'],$db->conn);
				
				$sql1=$product->addpro_details($sq,$details1,$_POST['monthly'],$_POST['yearly'],$_POST['sku'],$db->conn);
}
?>
<h1>add product</h1>
<div class="container">
	
	<form class="w-50 mx-auto py-5" action="" method="POST">

<div class="form-group">
<label for="example-search-input" class="form-control-label">Product Category</label>
<select name="parentid" id="parentid" class="form-control select">
<option value="">Select Product Category</option>
<?php
	include_once "Classes/DBconnection.php";
	$db=new DBconnection();
	include_once "Classes/Product.php";
	$prod=new Product();
	$result = $prod->ShowCategory($db->conn);
	foreach ($result as $key => $value) {
		echo "<option value='".$value['id']."'>".$value['prod_name']."</option>";
		
	}
?>
</select>
</div>
<p id="productcategory"></p>
<div class="form-group">
<label for="example-text-input" class="form-control-label">Product Name</label>
<input class="form-control productname" type="text" id="example-text-input" pattern="(^([A-z]+\-[0-9]+)$)|(^([A-z])+$)"  class="productname" required>
</div>
<p id="productname"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Product URL</label>
<input class="form-control" type="text" id="example-email-input" name="link">
</div>
<hr class="my-3">
<h2>Product Description</h2>
<hr class="my-3">
<div class="form-group">
<label for="example-email-input" class="form-control-label">Monthly Price</label>
<input class="form-control mpriceid" type="text" id="example-email-input"  pattern="\d{1,15}" name="monthly">
</div>
<p id="lablemprice"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Annual Price</label>
<input class="form-control apriceid" type="text" id="example-email-input" name="yearly">
</div>
<p id="lableaprice"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">SKU</label>
<input class="form-control sku" pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" type="text" id="example-email-input" name="sku">
</div>
<p id="sku"></p>
<hr class="my-3">
<h2>Features</h2>
<hr class="my-3">

<div class="form-group">
<label for="example-email-input" class="form-control-label">Web Space(in GB)</label>
<input class="form-control webid" type="text" id="example-email-input" name="webspace"  pattern='([0-9]+(\.[0-9]+)?)'>
<small>Enter 0.5 for 512 MB</small>
</div>
<p id="lableweb"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Bandwidth (in GB)</label>
<input class="form-control bandid" type="text" id="example-email-input" name="bandwidth" pattern="([0-9]+(\.[0-9]+)?)">
<small>Enter 0.5 for 512 MB</small>
</div>
<p id="lableband"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Free Domain</label>
<input class="form-control domainid" type="text" id="example-email-input" name="freedomain" pattern="((^[0-9]*$)|(^[A-Za-z]+$))">
<small>Enter 0 for no domain available in this service</small>
</div>
<p id="labledomain"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Language/Technology Support</label>
<input class="form-control  prolang" type="text" id="example-email-input" name="support">
<small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
</div>
<p id="prodlang"></p>
<div class="form-group">
<label for="example-email-input" class="form-control-label">MailBox</label>
<input class="form-control promail" type="text" id="example-email-input" name="mailbox">
<small>Enter Number of mailbox will be provided, enter 0 if none</small>
</div>
<p id="prodmail"></p>
<input type="submit" class="btn btn-primary btn-lg btn-block" name="add_prod" value="CREATE" id="submitprod">
</form>
</div>
<?php 
require "footer.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>