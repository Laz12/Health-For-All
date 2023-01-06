<!-- Grabs all the data from the database to populate the table -->
<?php
include '../connection.php';
$query = "SELECT * FROM Doctor";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Doctor's Info</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/registrationStyle.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
  <br /><br />
  <div class="container">
    <h2 align="center">Doctor Data</h2>
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <a type="button" class="btn btn-primary" href="../logout.php">Log out</a>
          </div>
        </div>
      </div>
      <br />
      <div id="doctor_table">
        <table class="table table-striped table-hover">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start day</th>
          </tr>
          <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
          <tr>
            <td><?php echo $row["Doctor_ID"]; ?></td>
            <td><?php echo $row["Doctor_name"]; ?></td>
            <td><?php echo $row["Doctor_start_date"]; ?></td>
          </tr>
          <?php
                    }
                    ?>
        </table>
      </div>
    </div>
  </div>
  </div>
</body>
</html>