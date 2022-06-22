<?php    
if(session_id() == '') {
  session_start();
}
if(isset($_SESSION['technician'])){
 $technician = $_SESSION["technician"];
} else {
 echo "<script> location.href='login.php'; </script>";
}
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM assignwork_tb LEFT JOIN requestinfo_tb ON assignwork_tb.request_info=requestinfo_tb.ri_id WHERE rno = {$_REQUEST['rno']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_REQUEST['createWorkReportSubmitBtn'])){
  // Checking for Empty Fields
  if(
    ($_REQUEST['report_details'] == "") || 
    ($_REQUEST['rno'] == "")
  ){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
  } else {
    // Assigning User Values to Variable
    $report_details = $_REQUEST['report_details'];
    $rno = $_REQUEST['rno'];

    $stmt = $conn->prepare("INSERT INTO workreport_tb (assignwork_id, report_details, technician_id) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $rno, $report_details, $technician["empid"]);

    if($stmt->execute()){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Report Created Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Create Work Report </div>';
    }
  }
  }
 // Assign work Order Request Data going to submit and save on db assignwork_tb table [END]
 ?>
<div class="col-sm-5 mt-5 jumbotron">
  <!-- Main Content area Start Last -->
  <form action="" method="POST">
    <input type="hidden" name="rno" value="<?php if(isset($row['rno'])) {echo $row['rno']; }?>" readonly>
    <h5 class="text-center">Create Work Report</h5>
    <div class="form-group">
      <label for="request_id">Report Details</label>
      <textarea class="form-control" id="report_details" name="report_details"></textarea>
    </div>
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="request_info">Request Info</label>
      <input type="hidden" name="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>">
      <input type="text" class="form-control" id="request_info" value="<?php if(isset($row['ri_details'])) {echo $row['ri_details']. ' (₱' . $row['ri_price'] . ')'; }?>" readonly>
</div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <input readonly type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?>">
    </div>
    <div class="form-group">
      <label for="requestdesc">Quantity</label>
      <input readonly type="number" min="1" class="form-control" id="requestdesc" name="requestquantity" value="<?php if(isset($row['request_quantity'])) { echo $row['request_quantity']; } ?>">
    </div>
    <div class="form-group">
      <label for="requestername">Name</label>
      <input readonly type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Address Line 1</label>
        <input readonly type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="address2">Type of Residency</label>
        <input readonly type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">City</label>
        <input readonly type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">State</label>
        <input readonly type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterzip">Zip</label>
        <input readonly type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?>"
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>" readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>"
          onkeypress="isInputNumber(event)" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="assigntech">Assign to Technician</label>
        <input type="text" class="form-control" id="assigntech" name="assigntech" value="<?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>" readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate" value="<?php if(isset($row['assign_date'])) {echo $row['assign_date']; }?>" readonly>
      </div>
    </div>
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="createWorkReportSubmitBtn">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>