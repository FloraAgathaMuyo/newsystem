<?php
define('TITLE', 'Create Work Report');
define('PAGE', 'workreport');
include('includes/header.php'); 
include('../dbConnection.php');

session_start();
if($_SESSION['technician']){
 $technician = $_SESSION['technician'];
} else {
 header("Location: ./login.php");
}
?>

<div class="col-sm-4 mb-5">
  <!-- Main Content area start Middle -->
  <?php 
 $sql = "SELECT * FROM assignwork_tb LEFT JOIN requestinfo_tb ON request_info=ri_id";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    ?>
   <div class="card mt-5 mx-5">
    <div class="card-header">
      Request ID : <?php echo $row['request_id']?>
    </div>
   <div class="card-body">
    <h5 class="card-title">
      Request Info : 
      <?php echo $row['ri_details']?>
      (₱<?php echo $row['ri_price']?>)
    </h5>
    <p class="card-text mb-0">
      <strong>
        Assigned Technician:
      </strong>
      <?php echo $row['assign_tech']?>
    </p>
    <p class="card-text">
      <strong>
        Assigned Date:
      </strong>
      <?php echo $row['assign_date']?>
    </p>
    <div class="float-right">
    <form action="" method="POST">
      <input type="hidden" name="rno" value='<?php echo $row['rno'] ?>'>
      <input type="submit" class="btn btn-danger mr-3" name="view" value="View">
    </form>
   </div>
   </div>
   </div>
   
   <?php
  }
 } else {
  ?>
  <div class="alert alert-info mt-5 col-sm-6" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>Aww yeah, you successfully assigned all Requests.</p>
    <hr>
    <h5 class="mb-0">No Pending Requests</h5>
  </div>
  <?php
 }
  ?>
</div> <!-- Main Content area End Middle -->

<?php
include('includes/footer.php'); 
include('includes/createworkreport.php'); 
$conn->close();
?>