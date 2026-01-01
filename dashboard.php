<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? 'light';
?>
<html>
<head>
    <style>
        .dark { background: #333; color: white; }
        .light { background: #fff; color: black; }
    </style>
</head>
<body class="<?php echo $theme; ?>">
    <h1>Welcome to the Portal</h1>
    <nav>
        <a href="preference.php">Settings</a> | 
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>