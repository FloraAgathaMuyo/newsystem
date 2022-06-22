<?php
define('TITLE', 'Product Report');
define('PAGE', 'sellreport');
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
    SELECT * FROM customer_tb 
  ";

  if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = $sql . "WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Address</th>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price Each</th>
        <th scope="col">Price Total</th>
        <th scope="col">Purchase Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sumTotal = 0; 
        while ($row = $result->fetch_assoc()) {
          $sumTotal = $sumTotal + $row["cptotal"];
      ?>
      <tr>
        <th scope="row">
          <?php echo $row["custid"]?>
        </th>
        <td scope="row">
          <?php echo $row["custname"]?>
        </td>
        <td scope="row">
          <?php echo $row["custadd"]?>
        </td>
        <td scope="row">
          <?php echo $row["cpname"]?>
        </td>
        <td scope="row">
          <?php echo $row["cpquantity"]?>
        </td>
        <td scope="row">
          ₱<?php echo $row["cpeach"]?>
        </td>
        <td scope="row">
          ₱<?php echo $row["cptotal"]?>
        </td>
        <td scope="row">
          <?php echo $row["cpdate"]?>
        </td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5"></td>
        <th colspan="1">
          SUM TOTAL
        </th>
        <td>
          ₱<?php echo $sumTotal?>
        </td>
        <td></td>
      </tr>
    </tfoot>
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