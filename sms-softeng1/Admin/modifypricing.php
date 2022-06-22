<?php    
define('MODE', ucfirst($_REQUEST["mode"]));
define('TITLE', MODE . ' Request Pricing');
define('PAGE', 'requestpricing');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }

 // Check if type is set. If none, return to mainpage
 if (!isset($_REQUEST['mode'])) header("Location: ./requestpricing.php");
 
  // update
  if(isset($_POST['submit']) && MODE == "Edit"){
    // Checking for Empty Fields
    if(
      ($_REQUEST['ri_details'] == "") || 
      ($_REQUEST['ri_price'] == "") || 
      ($_REQUEST['ri_id'] == "")
    ) {
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $ri_details = $_REQUEST['ri_details'];
      $ri_price = $_REQUEST['ri_price'];
      $ri_id = $_REQUEST['ri_id'];
      $updateStmt = $conn->prepare("UPDATE requestinfo_tb SET ri_details=?, ri_price=? WHERE ri_id=?");
      $updateStmt->bind_param("ssi", $ri_details, $ri_price, $ri_id);
      if($updateStmt->execute()){
      // below msg display on form submit success
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
      // below msg display on form submit failed
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
  } elseif(isset($_POST['submit']) && MODE == "Add") {
    // Checking for Empty Fields
    if(
      ($_REQUEST['ri_details'] == "") || 
      ($_REQUEST['ri_price'] == "")
    ) {
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $ri_details = $_REQUEST['ri_details'];
      $ri_price = $_REQUEST['ri_price'];
      $updateStmt = $conn->prepare("INSERT INTO requestinfo_tb SET ri_details=?, ri_price=?");
      $updateStmt->bind_param("ss", $ri_details, $ri_price);
      if($updateStmt->execute()){
      // below msg display on form submit success
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
      } else {
      // below msg display on form submit failed
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
      }
    }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center"><?php echo MODE?> Request Pricing</h3>
  <?php
 if(isset($_REQUEST['ri_id'])){
  $selectStmt = $conn->prepare("SELECT * FROM requestinfo_tb WHERE ri_id=?");
  $selectStmt->bind_param("s", $_REQUEST["ri_id"]);
  $selectStmt->execute();
  $result = $selectStmt->get_result();
  $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <?php
      if (MODE == "Edit") {
    ?>
    <div class="form-group">
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="ri_id" name="ri_id" value="<?php if(isset($row['ri_id'])) {echo $row['ri_id']; }?>"
        readonly>
    </div>
    <?php } ?>
    <div class="form-group">
      <label for="pname">Request Details</label>
      <input type="text" class="form-control" id="ri_details" name="ri_details" value="<?php if(isset($row['ri_details'])) {echo $row['ri_details']; }?>">
    </div>
    <div class="form-group">
      <label for="psellingcost">Price</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">₱</span>
        </div>
        <input type="text" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" onkeypress="isInputNumber(event)" name="ri_price" value="<?php if(isset($row['ri_price'])) {echo $row['ri_price']; }?>">
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" name="submit" value="<?php echo MODE ?>"><?php echo MODE?></button>
      <a href="requestpricing.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>