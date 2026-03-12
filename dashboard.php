<?php
require "protect.php";
require "db.php";

$totalCases = $conn->query("SELECT COUNT(*) FROM cases")->fetchColumn();
$totalDiseases = $conn->query("SELECT COUNT(*) FROM diseases")->fetchColumn();
?>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
<a href="report_case.php">Report New Case</a> |
<a href="view_cases.php">View Cases</a> |
<a href="logout.php">Logout</a>

<hr>

<h3>Dashboard Summary</h3>
Total Cases: <?php echo $totalCases; ?><br>
Total Diseases: <?php echo $totalDiseases; ?>