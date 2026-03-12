<?php
require "protect.php";
require "db.php";

$stmt = $conn->query("
SELECT c.*, d.disease_name, hf.facility_name
FROM cases c
JOIN diseases d ON c.disease_id = d.disease_id
JOIN health_facilities hf ON c.facility_id = hf.facility_id
ORDER BY c.date_reported DESC
");

$cases = $stmt->fetchAll();
?>

<h2>All Reported Cases</h2>

<table border="1" cellpadding="5">
<tr>
<th>Disease</th>
<th>Facility</th>
<th>Age</th>
<th>Gender</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php foreach($cases as $c){ ?>
<tr>
<td><?php echo $c['disease_name']; ?></td>
<td><?php echo $c['facility_name']; ?></td>
<td><?php echo $c['patient_age']; ?></td>
<td><?php echo $c['patient_gender']; ?></td>
<td><?php echo $c['case_status']; ?></td>
<td><?php echo $c['date_reported']; ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Back</a>