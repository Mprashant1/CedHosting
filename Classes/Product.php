<?php
    include_once "DBconnection.php";
    class Product{
        public $prod_parent_id;
        public $prod_name;
        public $link;
        public $prod_available;
        public $prod_launch_date;
        function AddProduct($name,$parent_id,$check,$conn){
            $sq = 'INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`,`html`,`prod_available`)
						VALUES ("'.$parent_id.'", "'.$name.'", " ","'.$check.'")';

						if ($conn->query($sq) === TRUE) {
						  $rtn ="success";
							// header("Location:login.php");
						} else {
						  $rtn= "Error: " . $sq . "<br>" . $conn->error;
						}
				
					return $rtn;
					$conn->close();
        }
        function ShowCategory($conn){
            $sql = "SELECT * FROM `tbl_product` where `html` != 'NULL'";
            $result = $conn->query($sql);
            $row=array();
            if ($result->num_rows > 0) {
            // output data of each row
            while($a = $result->fetch_assoc()) {
               $row[]=$a;
            }
            } else {
            echo "0 results";
            }
            return $row;
            $conn->close();
        }
     function addpro($pid,$pname,$conn)
		{
			$sql = 'INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`, `html`,`prod_available`)
      VALUES ("'.$pid.'", "'.$pname.'", " ","1")';
      if ($conn->query($sql) === TRUE) {
        $last_id = mysqli_insert_id($conn);
        return $last_id;
        //echo "New record created successfully. Last inserted ID is: " . $last_id;
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    }
   function addpro_details($pid,$desc,$monthly,$yearly,$sku,$conn)
		{
      $sql = "INSERT INTO `tbl_product_description` (`prod_id`,`description`,`mon_price`,`annual_price`,`sku`)
              VALUES ('".$pid."','".$desc."','".$monthly."','".$yearly."','".$sku."')";

              if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
              } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
              }

              $conn->close();
    }
    function ShowProduct($conn){
      $sql='SELECT tbl_product_description.id,prod_id,`description`,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id';
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        $row=array();
        while($a = $result->fetch_assoc()) {
          $row[]=$a;
       }
      }
      return $row;
            $conn->close();
    }
    function ShowProduct1($id,$conn){
      $sql='SELECT tbl_product_description.id,prod_id,`description`,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description  INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id where `prod_id`='.$id;
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        $row=array();
        while($a = $result->fetch_assoc()) {
          $row[]=$a;
       }
      }
      return $row;
            $conn->close();
    }
    }

?>