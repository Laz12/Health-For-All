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
    <!-- Brarry Css js  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
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
                    <!-- <div class="col-sm-6">
                        <h2>Patient Data</h2>
                    </div> -->
                    <div class="col-sm-6">
                        <!-- <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-warning">Insert</button> -->
                        <a type="button" name="add" id="add" class="btn btn-warning" href="patientTableInsert.php"
                            data-target="#add_data_Modal">Insert</a>
                        <a type="button" name="btn_delete" id="btn_delete" class="btn btn-danger"
                            href="patientTableDelete.php">Delete</a>
                            <a type="button" class="btn btn-primary" href="../roles/admin.php">Home</a>
                            

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
                        <td><a type="button" name="edit" value="Edit" href="patientTableUpdate.php" 
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


<!-- Delete  Feature-->
<div id="deletePatient" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="insert_form">
                <div class="form-element">
                    <label>Patient_ID</label>
                    <input type="text" name="Patient_ID" required />
                </div> 
                <input type="submit" class="btn btn-danger" value="Delete" id="<?php echo $row["Patient_ID"]; ?>">
            </form>
        </div>
    </div>
</div>

<script>
    // Selects the document (html doc), and if it has been run, it'll execute what is inside the jquery function
    $(document).ready(function () {  
        if (confirm("Are you sure you want to delete this?")) {
            var [i] = [];
            // $() represents a selector of an html element (e.g. tags suchs as button, p, etc based on their name,id, ...)
            // When the checkbox is selected, call a function to remove the row
            $(':checkbox:checked').each(function (i) {
                $(this).remove();
            });
            if (id.length === 0) {
                alert("Select at least one checkbox");
            }
            else {
                // Ajax request updates a page by exchanging data with a web server behind the scenes
                // It sends requests to url, method sends data to server, 
                // data is what data we want to send to server
                $.ajax({
                    url: 'patientTableDelete.php',
                    method: 'POST',
                    data: { id: id },
                    success: function () {
                        for (var i = 0; i < id.length; i++) {
                            $('tr#' + id[i].css('background-color', '#ccc'))
                            $('tr#' + id[i]).fadeOut('slow');
                        }
                    }
                });
            }
        }
        else {
            return false;
        }
    });
})
</script>

<script>
    $(document).ready(function () {

        $('#btn_delete').click(function () {

            if (confirm("Are you sure you want to delete this?")) {
                var id = [];

                $(':checkbox:checked').each(function (i) {
                    id[i] = $(this).val();
                });

                if (id.length === 0) //tell you if the array is empty
                {
                    alert("Select at least one checkbox");
                }
                else {
                    $.ajax({
                        url: 'PatientTableDelete.php',
                        method: 'POST',
                        data: { id: id },
                        success: function () {
                            for (var i = 0; i < id.length; i++) {
                                $('tr#' + id[i] + '').css('background-color', '#ccc');
                                $('tr#' + id[i] + '').fadeOut('slow');
                            }
                        }

                    });
                }
            }
            else {
                return false;
            }
        });
    });
</script>