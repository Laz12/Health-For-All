
<form method="post" action="" name="signup-form">
    <link rel="stylesheet" href="../css/registrationStyle.css">
    <div class="form-element">
    <label>Treatment_ID</label>
    <input type="text" name="Treatment_ID" required />
    </div>
    <div class="form-element">
    <label>Treatment_stage</label>
    <input type="text" name="Treatment_stage" required />
    </div>
    <div class="form-element">
    <label>Treatment_cost</label>
    <input type="text" name="Treatment_cost" required />
    </div>
    <div class="form-element">
    <label>Treatment_option</label>
    <input type="text" name="Treatment_option" required />
    </div>
    <button type="submit" name="register" value="register">Insert</button>
</form>
<?php
    include('../Config.php');
    if (isset($_POST['register'])) {
        $Treatment_ID = (int) $_POST['Treatment_ID'];
        $Treatment_stage = (int) $_POST['Treatment_stage'];
        $Treatment_cost = $_POST['Treatment_cost'];
        $Treatment_option =  $_POST['Treatment_option'];
        $query = $connection->prepare("SELECT * FROM Treatment WHERE Treatment_ID=:Treatment_ID");
        $query->bindParam("Treatment_ID", $Treatment_ID, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">This treatment is already in the databse!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO Treatment(Treatment_ID, Treatment_stage, Treatment_cost, Treatment_option) VALUES (:Treatment_ID, :Treatment_stage, :Treatment_cost, :Treatment_option)");
            $query->bindParam("Treatment_ID", $Treatment_ID, PDO::PARAM_INT);
            $query->bindParam("Treatment_stage", $Treatment_stage, PDO::PARAM_INT);
            $query->bindParam("Treatment_cost", $Treatment_cost, PDO::PARAM_STR);
            $query->bindParam("Treatment_option", $Treatment_option, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="error">Data inserted!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
        header("Location: treatment.php");
    }
?>