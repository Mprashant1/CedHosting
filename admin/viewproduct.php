<?php
  session_start();
    include 'header.php';
    include_once "../Classes/DBconnection.php";
    $db=new DBconnection();
    include_once "../Classes/Product.php";
    $prod=new Product();
    $result=$prod->ShowProduct($db->conn);
    // print_r($result);
    
?>
  <div class="table-responsive">
              <table class="table align-items-center table-flush" id="product">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Product Id</th>
                    <th scope="col" class="sort" data-sort="budget">Product Name</th>
                    <th scope="col" class="sort" data-sort="status">Product Parent Id</th>
                    <th scope="col">Monthly Price</th>
                    <th scope="col" class="sort" data-sort="completion">Annual Price</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Launch Date</th>
                    <th scope="col">Description</th>
                    
                  </tr>
                </thead>
                <tbody class="list">
                    <?php
                     foreach($result as $value){
                         $des=json_decode($value['description']);
                        //  print_r($des->webspace);
                         echo "<tr>";
                         echo "<td>".$value['prod_id']."</td>";
                         echo "<td>".$value['prod_name']."</td>";
                         echo "<td>".$value['prod_parent_id']."</td>";
                         echo "<td>".$value['mon_price']."</td>";
                         echo "<td>".$value['annual_price']."</td>";
                         echo "<td>".$value['sku']."</td>";
                         echo "<td>".$value['prod_launch_date']."</td>";
                         echo "<td><ul><li>Webspace:-".$des->webspace."</li>
                         <li>Bandwidth:-".$des->bandwidth."</li>
                         <li>Free domain:-".$des->free_domain."</li>
                         <li>Support:-".$des->support."</li></ul></td>";
                        
                         
                     }
                    ?>
                    </tr>
                  </tr>
                </tbody>
              </table>
            </div>
<?php
 include 'footer.php';
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#product').DataTable();
        })
    </script>