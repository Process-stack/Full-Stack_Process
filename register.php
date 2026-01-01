<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST['student_id'];
    $name = $_POST['name'];
    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO students (student_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $sid, $name, $hash);
    
    if ($stmt->execute()) {
        header("Location: login.php");
    }
    $stmt->close();
}
?>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>