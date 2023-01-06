<!-- Grabs all the data from the database to populate the table -->
<?php
include '../connection.php';
$query = "SELECT * FROM Patient";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient's Info</title>
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
        <h2 align="center">Patient Data</h2>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <a type="button" name="add" id="add" class="btn btn-warning" href="../Doctor_tables/patientTableInsert.php"
                            data-target="#add_data_Modal">Insert</a>
                            <a type="button" class="btn btn-primary" href="../roles/doctor.php">Home</a>
                            

                    </div>
                </div>
            </div>
            <br />
            <div id="patient_table">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>
                        </th>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Ethnicity</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="checkbox"
                                    value="<?php echo $row["Patient_ID"]; ?>">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?php echo $row["Patient_ID"]; ?></td>
                        <td><?php echo $row["Patient_first_name"]; ?></td>
                        <td><?php echo $row["Patient_last_name"]; ?></td>
                        <td><?php echo $row["Patient_gender"]; ?></td>
                        <td><?php echo $row["Patient_age"]; ?></td>
                        <td><?php echo $row["Patient_ethnicity"]; ?></td>
                        <td><?php echo $row["Patient_socioeconomic_status"]; ?></td>
                        <!-- <td><input type="button" name="edit" value="Edit" id="<?php echo $row["Patient_ID"]; ?>"
                                class="btn btn-info btn-xs edit_data" /></td> -->
                        <td><a type="button" name="edit" value="Edit" href="../Doctor_tables/patientTableUpdate.php" 
                                class="btn btn-info btn-xs edit_data">Edit</a></td>
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