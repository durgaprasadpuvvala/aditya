<?php include("config.php");

$date = $_GET['date'];
$result = $conn->query("SELECT * FROM memories WHERE memory_date = '$date'");

echo "<link rel='stylesheet' href='style.css'>";
echo "<h2>Memories on $date</h2>";
echo "<a href='index.php'>Back to Calendar</a><br><br>";

while ($row = $result->fetch_assoc()) {
    echo "<h3>{$row['title']}</h3>";
    echo "<img src='uploads/{$row['image']}' width='200'><br>";
    echo "<p>{$row['description']}</p>";
    echo "<hr>";
}
?>