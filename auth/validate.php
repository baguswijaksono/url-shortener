<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['email'] = $email;
    header("Location: /eslolin/home");
    exit();
} else {
    echo "Invalid email or password.";
}
?>
