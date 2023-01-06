<!-- Connection to the database -->
<!-- 
    * -> is used to access methods and properties of an object
    * What it means is that what is on the right side is a member 
    * of the object isntantiated into the variable on the left side.
     
    *   Ex:
    *   // Create a new instance of MyObject into $obj
    *   $obj = new MyObject();
    *   // Set a property in the $obj object called thisMessage
    *   $obj->thisMessage = 'Fred';
    *   // Call a method of the $obj object named getMessage
    *   $obj->getProperty(); 
-->

<?php
$USER = 'team27';
$PASSWORD = 'Shout4_team27_GOTEAM';
$HOST = 'cmsc508.com';
$DATABASE = '202310_teams_team27';
// Test for errors.
// If the code in the try statement has an error
// The catch code gets executed executed.
try {
    // Allows access to the mysql database server
    $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);
    //echo $connection ? 'connected' : 'not connected';  // Tells me whether I am connected to the database
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>