<?php
include "db.php";

$id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (isset($_POST["update"])) {
    $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST["name"],
        $_POST["email"],
        $_POST["course"],
        $id
    ]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?= $student["name"] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $student["email"] ?>" required><br><br>
    Course: <input type="text" name="course" value="<?= $student["course"] ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>

<a href="index.php">Back</a>

</body>
</html>
