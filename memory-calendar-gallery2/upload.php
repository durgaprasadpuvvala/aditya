<?php include("config.php"); ?>

<link rel="stylesheet" href="style.css">

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Memory Title" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="date" name="memory_date" required><br>
    <input type="file" name="image" accept="image/*" required><br>
    <button type="submit" name="upload">Upload Memory</button>
</form>

<?php
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['memory_date'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO memories (title, description, image, memory_date)
            VALUES ('$title', '$desc', '$image', '$date')";
    $conn->query($sql);
    echo "Memory uploaded!";
}
?>