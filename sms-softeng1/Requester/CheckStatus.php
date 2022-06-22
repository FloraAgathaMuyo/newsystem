<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>
<div class="col-sm-9 mt-5  mx-3">
  <form action="CheckStatusDetailed.php" class="my-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-success">Search</button>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Req ID</th>
        <th scope="col">Request Info</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">Mobile</th>
        <th scope="col">Technician</th>
        <th scope="col">Assigned Date</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      <?php 

        // Left join submitrequest to requestinfo and assigned works for combined info in single table
        $requestsStmt = $conn->prepare("
        SELECT * 
        FROM submitrequest_tb 
        LEFT JOIN requestinfo_tb 
        ON submitrequest_tb.request_info=requestinfo_tb.ri_id 
        LEFT JOIN ( 
          SELECT 
            rno AS aw_rno, 
            request_id AS aw_request_id, 
            request_info AS aw_request_info, 
            request_desc AS aw_request_desc, 
            request_quantity AS aw_request_quantity,
            requester_name AS aw_requester_name, 
            requester_add1 AS aw_requester_add1, 
            requester_add2 AS aw_requester_add2, 
            requester_city AS aw_requester_city, 
            requester_state AS aw_requester_state, 
            requester_zip AS aw_requester_zip, 
            requester_email AS aw_requester_email, 
            requester_mobile AS aw_requester_mobile, 
            assign_tech AS aw_assign_tech, 
            assign_date AS aw_assign_date, 
            requester_id AS aw_requester_id 
          FROM assignwork_tb
        ) assignwork_tb 
        ON assignwork_tb.aw_request_id=submitrequest_tb.request_id 
        WHERE requester_id=?
        ");
        $requestsStmt->bind_param("i", $_SESSION["requester"]["r_login_id"]);
        $requestsStmt->execute();
        $requestsResult = $requestsStmt->get_result();
        $requests = $requestsResult->fetch_all(MYSQLI_ASSOC);
        foreach ($requests as $key => $request) {
      ?>
      <!-- <tr>
        <td colspan="9">
          <pre>
            <?php print_r($request)?>
          </p>
        </td>
      </tr> -->
      <tr>
        <td>
          <?php 
          if (isset($request["aw_request_id"])) 
            echo $request["aw_request_id"]; 
          else 
            echo $request["request_id"];
          ?>
        </td>
        <td>
          <?php echo $request["ri_details"] ?>
          <strong>
            (₱<?php echo $request["ri_price"] ?>)
          </strong>
        </td>
        <td>
          <?php 
          if (isset($request["aw_requester_name"])) 
            echo $request["aw_requester_name"]; 
          else 
            echo $request["requester_name"];
          ?>
        </td>
        <td>
          <?php 
          if (isset($request["aw_requester_add1"])) 
            echo $request["aw_requester_add1"]; 
          else 
            echo $request["requester_add1"];
          ?>
        </td>
        <td>
          <?php 
          if (isset($request["aw_requester_city"])) 
            echo $request["aw_requester_city"]; 
          else 
            echo $request["requester_city"];
          ?>
        </td>
        <td>
          <?php 
          if (isset($request["aw_requester_mobile"])) 
            echo $request["aw_requester_mobile"]; 
          else 
            echo $request["requester_mobile"];
          ?>
        </td>
        <?php if (isset($request["aw_assign_tech"])) {?>
          <td><?php echo $request["aw_assign_tech"]?></td>
          <td><?php echo $request["aw_assign_date"]?></td>
          <td>
            <form action="CheckStatusDetailed.php" method="GET" class="d-inline"> 
              <input type="hidden" name="checkid" value='<?php echo $request["request_id"]?>'>
              <button type="submit" class="btn btn-warning" name="view" value="View">
                <i class="far fa-eye"></i>
              </button>
            </form>
          </td>
        </td>
        <?php } else {?>
          <td colspan="3">
            <div class="d-flex">
              <div class="badge badge-info p-2 ml-auto">Pending</d>
            </div>
          </td>
        <?php }?>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
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