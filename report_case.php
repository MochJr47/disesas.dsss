<?php
require "protect.php";
require "db.php";

if(isset($_POST['submit'])){
    $stmt = $conn->prepare("INSERT INTO cases 
        (disease_id, facility_id, patient_age, patient_gender, case_status, date_reported)
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $_POST['disease_id'],
        $_POST['facility_id'],
        $_POST['age'],
        $_POST['gender'],
        $_POST['status'],
        $_POST['date']
    ]);

    echo "Case Reported Successfully!";
}

$diseases = $conn->query("SELECT * FROM diseases")->fetchAll();
$facilities = $conn->query("SELECT * FROM health_facilities")->fetchAll();
?>

<h2>Report Case</h2>

<form method="POST">
Disease:
<select name="disease_id">
<?php foreach($diseases as $d){ ?>
<option value="<?php echo $d['disease_id']; ?>">
<?php echo $d['disease_name']; ?>
</option>
<?php } ?>
</select><br><br>

Facility:
<select name="facility_id">
<?php foreach($facilities as $f){ ?>
<option value="<?php echo $f['facility_id']; ?>">
<?php echo $f['facility_name']; ?>
</option>
<?php } ?>
</select><br><br>

Age: <input type="number" name="age" required><br><br>

Gender:
<select name="gender">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select><br><br>

Status:
<select name="status">
<option>Suspected</option>
<option>Confirmed</option>
<option>Recovered</option>
<option>Death</option>
</select><br><br>

Date: <input type="date" name="date" required><br><br>

<button name="submit">Submit Case</button>
</form>

<br>
<a href="dashboard.php">Back</a>