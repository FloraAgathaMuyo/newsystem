<?php
define('TITLE', 'Request Pricing');
define('PAGE', 'requestpricing');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}


// Check if deleting
if (isset($_POST["type"]) && isset($_POST["ri_id"]) && is_numeric($_POST["ri_id"])) {
  $deleteStmt = $conn->prepare("DELETE FROM requestinfo_tb WHERE ri_id=?");
  $deleteStmt->bind_param("i", $_POST["ri_id"]);
  $deleteStmt->execute();
  header("Location: " . $_SERVER['PHP_SELF']);
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-success text-white p-2">Request Pricings</p>
  <?php
  $sql = "SELECT * FROM requestinfo_tb";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Request Info ID</th>
          <th scope="col">Request Details</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr scope='row'>
            <td><?php echo $row["ri_id"] ?></td>
            <td><?php echo $row["ri_details"] ?></td>
            <td>₱<?php echo $row["ri_price"] ?></td>
            <td>
              <form action="modifypricing.php" method="GET" class="d-inline">
                <input type="hidden" name="ri_id" value='<?php echo $row["ri_id"] ?>'>
                <button type="submit" class="btn btn-info" name="mode" value="edit">
                  <i class="fas fa-pen"></i>
                </button>
              </form>
              <form action="" method="POST" class="d-inline">
                <input type="hidden" name="ri_id" value='<?php echo $row["ri_id"] ?>'>
                <button type="submit" class="btn btn-secondary" name="type" value="Delete">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
    echo "0 Result";
  }
  if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if ($conn->query($sql) === TRUE) {
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
  ?>
</div>
</div>
<a class="btn btn-danger box" href="modifypricing.php?mode=add"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('includes/footer.php');
?>