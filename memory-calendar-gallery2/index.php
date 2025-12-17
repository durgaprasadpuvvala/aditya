<?php
include("config.php");

// Get month & year safely
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');
$year  = isset($_GET['year'])  ? (int)$_GET['year']  : date('Y');

// Fix month overflow
if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}

$month = str_pad($month, 2, '0', STR_PAD_LEFT);

$firstDay  = "$year-$month-01";
$totalDays = date('t', strtotime($firstDay));
$startDay  = date('w', strtotime($firstDay));

// Fetch memories safely
$stmt = $conn->prepare("
    SELECT memory_date, title 
    FROM memories 
    WHERE MONTH(memory_date) = ? 
    AND YEAR(memory_date) = ?
");
$stmt->bind_param("ii", $month, $year);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[$row['memory_date']][] = htmlspecialchars($row['title']);
}

$today = date('Y-m-d');
?>

<link rel="stylesheet" href="style.css">

<h2>📅 Memory Calendar</h2>

<a href="upload.php">+ Add Memory</a> |
<a href="gallery.php">View Gallery</a>

<br><br>

<!-- Month Navigation -->
<a href="?month=<?= $month-1 ?>&year=<?= $year ?>">⬅ Prev</a> |
<strong><?= date("F Y", strtotime($firstDay)) ?></strong> |
<a href="?month=<?= $month+1 ?>&year=<?= $year ?>">Next ➡</a>

<br><br>

<div class="calendar">
<?php
for ($i = 0; $i < $startDay; $i++) {
    echo "<div class='empty'></div>";
}

for ($d = 1; $d <= $totalDays; $d++) {
    $day  = str_pad($d, 2, '0', STR_PAD_LEFT);
    $date = "$year-$month-$day";

    $class = ($date == $today) ? "memory-box today" : "memory-box";

    echo "<div class='$class'>";
    echo "<strong>$d</strong><br>";

    if (isset($events[$date])) {
        foreach ($events[$date] as $title) {
            echo "<a href='view.php?date=$date'>$title</a><br>";
        }
    }

    echo "</div>";
}
?>
</div>
