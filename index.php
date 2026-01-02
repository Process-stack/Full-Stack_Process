<?php
include "db.php";

$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h2>Student List</h2>

<a href="add.php">Add Student</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

<?php foreach ($students as $row) { ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["course"] ?></td>
        <td>
            <a href="edit.php?id=<?= $row["id"] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row["id"] ?>" 
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
<?php } ?>

</table>

</body>
</html>
