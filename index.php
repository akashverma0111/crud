<?php 
define('IS_ACCESS','yes');
require_once 'assets/header.php';
require_once 'config/dbconnection.php';

$sql = "select * from classes";
$resultset = mysqli_query($conn, $sql);



?>

<div class="card">
  <div class="card-header" style="background: white;">
    <h4>Basic</h4>
    
    <a class="btn btn-light" href="plan.php">Plans</a>
    <a class="btn btn-secondary" href="index.php">Clases</a>
  </div>
  <div class="card-body">
  	<?php while($result = mysqli_fetch_assoc($resultset)){  ?>
    <p class="card-text"><b>Duration: </b> <?php echo $result['id']; ?> </p>
    <p class="card-text"><b>Price: </b> <?php echo $result['class_price']; ?>  </p>
    <p class="card-text"><b>Classes: </b> <?php echo $result['class_name']; ?> </p>
    <p class="card-text"><b>Description: </b> <?php echo $result['class_short_description']; ?> </p>
    <p class="card-text"><b>Benifit: </b> <?php echo $result['class_benefits']; ?></p>
    <p class="card-text"><b>Cover: </b> <?php echo $result['class_cover']; ?> </p>
    <p class="card-text"><b>Trainer: </b> <?php echo $result['class_trainer']; ?> </p>
    <p class="card-text"><b>Status: </b> <?php echo $result['class_status']; ?> </p>
    <p class="card-text"><a class="btn btn-primary" href="details.php?id=<?php echo $result['id']; ?>">Details</a> </p><hr>

<?php } ?>
  </div>
</div>

<?php require_once 'assets/footer.php'; ?>