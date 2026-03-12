<?php
include "config.php";

if(isset($_POST['save'])){
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $residence = $_POST['residence'];

    $conn->query("INSERT INTO patients (age,sex,residence)
                  VALUES ('$age','$sex','$residence')");
    echo "Patient Added";
}
?>

<form method="POST">
<input type="number" name="age" placeholder="Age" required>
<select name="sex">
<option>Male</option>
<option>Female</option>
</select>
<input type="text" name="residence" placeholder="Residence">
<button name="save">Save</button>
</form>