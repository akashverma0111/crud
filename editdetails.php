 <?php 
define('IS_ACCESS','yes');
require_once 'assets/header.php';
$id = $_GET['id'];
require_once 'config/dbconnection.php';

$sql = "select * from classes join membership where classes.class_status = membership.membership_status and classes.id = $id";
$resultset = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($resultset);



if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $classname = isset($_POST['classname']) ? $_POST['classname'] : null;
  $classprice = isset($_POST['price']) ? $_POST['price'] : null;
  $classduration = isset($_POST['duration']) ? $_POST['duration'] : null;
  $classstatus = isset($_POST['status']) ? $_POST['status'] : null;
  $membership_offer_name = isset($_POST['offername']) ? $_POST['offername'] : null;
  $membership_discount_persentage = isset($_POST['discount']) ? $_POST['discount'] : null;
  $membership_status = isset($_POST['status']) ? $_POST['status'] : null;

  $sql = "update classes
set class_name = '{$classname}', class_price = '{$classprice}', class_duration = '{$classduration}', class_status = '{$classstatus}' where id = '{$id}';";
$sql .= "update membership
set membership_offer_name = '{$membership_offer_name}', membership_discount_percentage = '{$membership_discount_persentage}', membership_status = '{$membership_status}'
where membership_status = '{$id}';";
//echo $sql;
$result = mysqli_multi_query($conn, $sql);


if(mysqli_affected_rows($conn) >= 0){
   header("Location: index.php");
}
}





?>


<div class="card">
  <div class="card-header" style="background: white;">
    <h4>Basic</h4>
    <a class="btn btn-light" href="plan.php">Plans</a>
    <a class="btn btn-light" href="index.php">Clases</a>
  </div>
  <div class="card-body">

<form action="#" method="post" enctype="multipart/form-data">


                  <div class="form-group">
                    <label for="classname">Class Name</label>
                    <input type="text" class="form-control" name="classname" id="classename" value="<?php echo $result['class_name']; ?>" placeholder="Enter classename">
                  </div>
                  <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" value="<?php echo $result['class_duration']; ?>"  placeholder="Enter duration">
                  </div>
                  <div class="form-group">
                    <label for="fee">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $result['class_price']; ?>"  placeholder="Enter total price">
                  </div>

                  <div class="form-group">
                    <label for="offername">Offer Name</label>
                    <input type="text" class="form-control" id="offername" value="<?php echo $result['membership_offer_name']; ?>"  name="offername" placeholder="Enter offername">
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount Persentage</label>
                    <input type="text" class="form-control" id="discount" value="<?php echo $result['membership_discount_percentage']; ?>"  name="discount" placeholder="Enter discount persentage">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="<?php echo $result['class_status']; ?>"  name="status" placeholder="Enter status">
                  </div><br>



                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

  </div>
</div>




<?php require_once 'assets/footer.php'; ?>

