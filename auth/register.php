<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`) VALUES (NULL, '$username', '$email', 'user', '$password')";
if (mysqli_query($conn, $sql)) {
    header("Location: ../sucess.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
