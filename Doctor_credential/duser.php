<!-- Grabs all the data from the database to populate the table -->
<?php
include '../connection.php';
$query = "SELECT * FROM Users";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User's Info</title>
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
        <h2 align="center">User Data</h2>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <a type="button" name="add" id="add" class="btn btn-warning" href="../Doctor_tables/userInsert.php"
                            data-target="#add_data_Modal">Insert</a>
                        <a type="button" class="btn btn-primary" href="../roles/doctor.php">Home</a>
                            

                    </div>
                </div>
            </div>
            <br />
            <div id="user">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>
                        </th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="checkbox"
                                    value="<?php echo $row["username"]; ?>">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["role"]; ?></td>
                        <td><a type="button" name="edit" value="Edit" href="../Doctor_tables/userUpdate.php"
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