<?php include "header.php";?>
    <!-- Header -->
    <!-- Page Content -->
    <?php
        include_once "../Classes/DBconnection.php";
        $db=new DBconnection();
        include_once "../Classes/Product.php";
        if(isset($_POST['create'])){
            $name=$_POST['product_name'];
            $parent_id=$_POST['prod_parent_id'];
            $check = isset($_POST['check']) ? 1 : 0;
            $prod=new Product();
            $result=$prod->AddProduct($name,$parent_id,$check,$db->conn);
            echo $result;
        }
    
    ?>
    <div class="alert alert-success w-50 mt-3 mx-auto category" role="alert" id="success" hidden>
        <strong>Category Created Successfully!</strong>
    </div>
    <div class="alert alert-danger w-50 mt-3 mx-auto category" role="alert" id="wrong" hidden>
        <strong>Something went wrong!</strong>
    </div>
    <div class="w-50 mx-auto py-5">
        <form class="" action=" " method="POST">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Product Name</label>
            <input class="form-control" type="text" id="example-text-input" name="product_name">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Product Parent ID</label>
            <input class="form-control" type="number" id="example-search-input" name="prod_parent_id">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Link</label>
            <input class="form-control" type="url" id="example-email-input" name="link">
        </div>
        <div class="form-group">
        <label class="form-control-label">Product Availability</label><br>
        <label class="custom-toggle">
            <input type="checkbox" name="check">
            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
        </label>
        </div>
        <div class="form-group w-100">
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="create" value="CREATE">
        </div>
    </form>
    </div>
    <div class="mx-auto">
    <table id="subcategorytable" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class="th-sm">Category ID
            </th>
            <th class="th-sm">Category Name
            </th>
            <th class="th-sm">Category Parent ID
            </th>
            <th class="th-sm">Availability
            </th>
            <th class="th-sm">Date Added
            </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // require_once "../class/Product.php";
                // $db = new DBconnection();
                $prod=new Product();

                $show_category = $prod->ShowCategory($db->conn);
                foreach ($show_category as $key => $value) {
                    echo "<tr>
                            <td>".$value['id']."</td>
                            <td>".$value['prod_name']."</td>
                            <td>".$value['prod_parent_id']."</td>
                            <td>".$value['prod_available']."</td>
                            <td>".$value['prod_launch_date']."</td>
                        </tr>";
                }
            ?>  
            
        </tbody>
    </table>
    </div> 
    <!-- Footer-->
<?php include "footer.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#subcategorytable').DataTable();
        })
    </script>