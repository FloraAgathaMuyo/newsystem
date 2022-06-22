<?php
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
include('includes/header.php');
include('../dbConnection.php'); 
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div> <span> to </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
        <input type="submit" class="btn btn-secondary" name="searchreset" value="Reset">
      </div>
    </div>
  </form>
  <?php
  $sql = "
    SELECT * 
    FROM workreport_tb 
    LEFT JOIN assignwork_tb 
    ON assignwork_tb.rno=workreport_tb.assignwork_id 
    LEFT JOIN requestinfo_tb 
    ON assignwork_tb.request_info=requestinfo_tb.ri_id 
    ";

  if(isset($_REQUEST['searchsubmit'])) {
    $startdate = date("Y-m-d H:i:s", strtotime($_REQUEST['startdate']));
    $enddate = date("Y-m-d H:i:s", strtotime($_REQUEST['enddate']));
    $sql = $sql . "
      WHERE created_at BETWEEN '$startdate' AND '$enddate'
    ";
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Req ID</th>
        <th scope="col">Request Info</th>
        <th scope="col">Requester Name</th>
        <th scope="col">Address</th>
        <th scope="col">Report Details</th>
        <th scope="col">Technician</th>
        <th scope="col">Report Date</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <th scope="row">
          <?php echo $row["request_id"]?>
        </th>
        <td scope="row">
          <?php echo $row["ri_details"]?>
          <span>
            (₱<?php echo $row["ri_price"]?>)
          </span>
        </td>
        <td scope="row">
          <?php echo $row["requester_name"]?>
        </td>
        <td scope="row">
          <?php echo $row["requester_add1"]?>
        </td>
        <td scope="row">
          <?php echo $row["report_details"]?>
        </td>
        <td scope="row">
          <?php echo $row["assign_tech"]?>
        </td>
        <td scope="row">
          <?php echo DateTime::createFromFormat("Y-m-d H:i:s", $row["created_at"])->format('M d, Y h:iA')?>
        </td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
  <?php 
  } else {
  ?>
    <div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>
      No Records Found!
    </div>
  <?php } ?>
</div>

<?php
include('includes/footer.php'); 
?>