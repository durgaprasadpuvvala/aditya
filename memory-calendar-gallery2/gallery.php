<?php include("config.php"); ?>

<link rel="stylesheet" href="style.css">
<h2>Gallery View</h2>
<a href="index.php">Back to Calendar</a>
<br><br>

<?php
$result = $conn->query("SELECT * FROM memories ORDER BY memory_date DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='gallery-image'>";
    echo "<img src='uploads/{$row['image']}' width='150'><br>";
    echo "{$row['title']}<br>";
    echo "{$row['memory_date']}";
    echo "</div>";
}
?>