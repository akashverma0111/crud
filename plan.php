<?php 
define('IS_ACCESS','yes');
require_once 'assets/header.php';
require_once 'config/dbconnection.php';

$sql = "select * from plans";
$resultset = mysqli_query($conn, $sql);



?>

<div class="card">
  <div class="card-header" style="background: white;">
    <h4>Basic</h4>
    
    <a class="btn btn-secondary" href="plan.php">Plans</a>
    <a class="btn btn-light" href="index.php">Clases</a>
  </div>
  <div class="card-body">
  	<?php while($result = mysqli_fetch_assoc($resultset)){  ?>
    <p class="card-text"><b>Plan: </b> <?php echo $result['plan_name']; ?> </p>
    <p class="card-text"><b>Workout: </b> <?php echo $result['plan_total_workouts']; ?>  </p>
    <p class="card-text"><b>Units: </b> <?php echo $result['duration_unit']; ?>  </p>
    <p class="card-text"><b>Total Weeks: </b> <?php echo $result['plan_total_weeks']; ?>  </p>
    <p class="card-text"><b>Duration: </b> <?php echo $result['plan_avg_duration']; ?> </p>
    <p class="card-text"><b>Description: </b> <?php echo $result['plan_description']; ?> </p>
    <p class="card-text"><b>Image: </b> <?php echo $result['plan_image']; ?></p>
    <p class="card-text"><b>Level: </b> <?php echo $result['plan_level']; ?> </p>
    <p class="card-text"><b>Status: </b> <?php echo $result['status']; ?> </p>
    <p class="card-text"><b>Workout Description: </b> <?php echo $result['plan_workouts_description']; ?> </p>
    <p class="card-text"><a class="btn btn-primary" href="details.php?id=<?php echo $result['id']; ?>">Details</a> </p><hr>

<?php } ?>
  </div>
</div>

<?php require_once 'assets/footer.php'; ?>