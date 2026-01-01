<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $sid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['student_id'] = $sid;
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    }
}
?>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>