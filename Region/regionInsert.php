<form method="post" action="" name="signup-form">
    <link rel="stylesheet" href="../css/registrationStyle.css">
    <div class="form-element">
    <label>Region_country_code</label>
    <input type="text" name="Region_country_code" required />
    </div>
    <div class="form-element">
    <label>Region_country_short_name</label>
    <input type="text" name="Region_country_short_name" required />
    </div>
    <div class="form-element">
    <label>Region_nationality</label>
    <input type="text" name="Region_nationality" required />
    </div>
    <div class="form-element">
    <label>Region</label>
    <input type="text" name="Region" required />
    </div>
    <div class="form-element">
    <label>Region_environment</label>
    <input type="text" name="Region_environment" required />
    </div>
    <button type="submit" name="register" value="register">Insert</button>
</form>
<?php
    include('../Config.php');
    if (isset($_POST['register'])) {
        $Region_country_code = $_POST['Region_country_code'];
        //  $Doctor_name = $_POST['Region_Disease_ID'];
        $Region_country_short_name = $_POST['Region_country_short_name'];
        $Region_nationality = $_POST['Region_nationality'];
        $Region = $_POST['Region'];
        $Region_environment = $_POST['Region_environment'];
        $query = $connection->prepare("SELECT * FROM Region WHERE Region_country_code=:Region_country_code");
        $query->bindParam("Region_country_code", $Region_country_code, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">This country is already in the databse!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO Region(Region_country_code, Region_country_short_name, Region_nationality, Region, Region_environment) VALUES (:Region_country_code, :Region_country_short_name, :Region_nationality, :Region, :Region_environment)");
            // Binding parameter(Doctor_ID) with corresponding variable($Doctor_ID), 
            // and the output from this will be of type int(PDO::PARAM_INT) 
            $query->bindParam("Region_country_code", $Region_country_code, PDO::PARAM_STR); 
            // $query->bindParam("Region_Disease_ID", $Region_Disease_ID, PDO::PARAM_STR);
            $query->bindParam("Region_country_short_name", $Region_country_short_name, PDO::PARAM_STR);
            $query->bindParam("Region_nationality", $Region_nationality, PDO::PARAM_STR);
            $query->bindParam("Region", $Region, PDO::PARAM_STR);
            $query->bindParam("Region_environment", $Region_environment, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                header("Location: region.php");
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
        
    }
?>