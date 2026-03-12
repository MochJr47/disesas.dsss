<?php
include "config.php";

if(isset($_POST['save'])){
    $name = $_POST['disease_name'];
    $desc = $_POST['description'];

    $conn->query("INSERT INTO diseases (disease_name,description)
                  VALUES ('$name','$desc')");
    echo "Disease Added";
}
?>

<form method="POST">
<input type="text" name="disease_name" placeholder="Disease Name" required>
<textarea name="description" placeholder="Description"></textarea>
<button name="save">Save</button>
</form>