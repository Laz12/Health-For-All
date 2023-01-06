<!-- The isset method collects the value of what will be deleted -->
<?php
include '../connection.php'; 

//delete.php
// This condition checks if the variable POST is set (declared and not null)
if(isset($_POST["id"]))
{
    foreach($_POST["id"] as $id)
    {
        $query = "DELETE FROM Disease WHERE Disease_ID = '".$id."'";
        mysqli_query($connection, $query);
    } 
}
header("Location: disease.php");
?>