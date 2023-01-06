<form method="post" action="" name="signup-form">
    <link rel="stylesheet" href="../css/registrationStyle.css">
    <div class="form-element">
    <label>Doctor_ID</label>
    <input type="text" name="Doctor_ID" required />
    </div>
    <div class="form-element">
    <label>Doctor_name</label>
    <input type="text" name="Doctor_name" required />
    </div>
    <div class="form-element">
    <label>Doctor_start_date</label>
    <input type="text" name="Doctor_start_date" required />
    </div>
    <button type="submit" name="register" value="register">Insert</button>
</form>
<?php
    include('../Config.php');
    if (isset($_POST['register'])) {
        $Doctor_ID = (int) $_POST['Doctor_ID'];
        $Doctor_name = $_POST['Doctor_name'];
        $Doctor_start_date = $_POST['Doctor_start_date'];
        $query = $connection->prepare("SELECT * FROM Doctor WHERE Doctor_ID=:Doctor_ID");
        $query->bindParam("Doctor_ID", $Doctor_ID, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">This doctor is already in the databse!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO Doctor(Doctor_ID, Doctor_name, Doctor_start_date)Values (:Doctor_ID, :Doctor_name, :Doctor_start_date)");
            // Binding parameter(Doctor_ID) with corresponding variable($Doctor_ID), 
            // and the output from this will be of type int(PDO::PARAM_INT) 
            $query->bindParam("Doctor_ID", $Doctor_ID, PDO::PARAM_INT); 
            $query->bindParam("Doctor_name", $Doctor_name, PDO::PARAM_STR);
            $query->bindParam("Doctor_start_date", $Doctor_start_date, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                header("Location: ../Doctor_credential/ddoctor_table.php");
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
        
    }
?>