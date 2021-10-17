<?php 
define('IS_ACCESS','yes');
require_once 'assets/header.php';
$id = $_GET['id'];
require_once 'config/dbconnection.php';
$sql = "select * from classes join membership where classes.class_status = membership.membership_status and classes.id = $id";
$resultset = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($resultset);




?>

<div class="card">
  <div class="card-header" style="background: white;">
    <h4>Basic</h4>
    <a class="btn btn-secondary" href="details.php">Details</a>
    <a class="btn btn-light" href="plan.php">Plans</a>
    <a class="btn btn-light" href="index.php">Clases</a>
  </div>
  <div class="card-body">
    <?php 
    if($result == null) {
      echo '<p class="card-text"><b>Details: </b> not found </p>';
      exit();
    }
    


     ?>
    <p class="card-text"><b>Duration: </b> <?php echo $result['class_duration']; ?> </p>
    <p class="card-text"><b>Price: </b> <?php echo $result['class_price']; ?>  </p>
    <p class="card-text"><b>Classes: </b> <?php echo $result['class_name']; ?> </p>
    <p class="card-text"><b>Discount Persentage: </b> <?php echo $result['membership_discount_percentage']; ?> </p>
    <p class="card-text"><b>Offer Name: </b> <?php echo $result['membership_offer_name']; ?></p>
    <p class="card-text"><b>Status: </b> <?php echo $result['class_status']; ?> </p>
  </div>
  <div class="card-footer text-muted" style="background: white;">
    
    <a class="btn btn-primary" href="editdetails.php?id=<?php echo $result['id']; ?>" > <i class="fa fa-info-circle" aria-hidden="true"> Edit</i></a>

    <a class="btn btn-info" href="javascript:con(<?php echo $result['id']; ?>)"> <i class="fa fa-trash" aria-hidden="true"> Delete</i></a>
  </div>
</div>


<script type="text/javascript">
  function con(id) {
    $con = confirm('are you really want to delete details?');
    if($con == true){
      window.location.assign('delete.php?id='+ id);
    }
  }

</script>


<?php require_once 'assets/footer.php'; ?>