<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$userID = $_POST['userID'];
$shortUrl = $_POST['shortUrl'];
$originUrl = $_POST['originUrl'];

$query = "INSERT INTO `url` (`id`, `userID`, `shortUrl`, `originUrl`) VALUES (NULL, '1', 'bagus', 'bagus');";
$result = mysqli_query($conn, $query);
if ($result) {

} else {
    echo "Error updating status: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
