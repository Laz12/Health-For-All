<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Query9</title>
</head>
<style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
li{
font-size:24px;
}
h3{
font-size:24px;
letter-spacing:4px;}
body {
margin:0;
padding:0;
font: 400 15px/1.8 Lato, sans-serif;
color: #777;
width:100%;
height:100vh;
background-color: rgb(35, 143, 143);
background-size:cover;}

</style>
<body class="container-fluid">
<h1 class="text-monocase text-capitalize text-center text-light">Query 9</h1>
    
<ul class="text-center font-weight-bold text-monospace text-dark">  
<table border="1" 
class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" >Disease</th>
      <th scope="col" >Treatment</th>
      <th scope="col" >Stage</th>
    </tr>
  </thead>
<?php 
// DOCUMENT_ROOT to your include in which way 
// it will always go for the direct server path to the file.
include $_SERVER["DOCUMENT_ROOT"]."/connection.php";
?><br/>
<?php
       $query = "SELECT Disease_name AS Disease, Treatment_option AS Treatment, Disease_stage AS Stage
                  FROM Disease a
                  JOIN Treatment b ON (Disease_ID = Treatment_Disease_ID)
                  WHERE 1=1
                        AND disease_name LIKE 'Leukemia' ";

            $run = mysqli_query($connection, $query);

				   while($row = mysqli_fetch_array($run))
				   {
                    echo "<h3><tr><th>". $row['Disease'] ." </h3>";
                      echo "<h3><th>". $row['Treatment'] ." </h3>";
                        echo "<h3><th>". $row['Stage'] ." </th></tr></h3>";
				   }

			   ?></table></ul>
                   
<div class="container ">
<ul class="pager font-weight-bold text-monospace">


</ul></div><?php
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
              
</body>
</html>