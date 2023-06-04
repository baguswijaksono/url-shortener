<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$urlId = $_POST['urlId'];
$query = "DELETE FROM url WHERE `url`.`id` = ".$urlId."";
$result = mysqli_query($conn, $query);
if ($result) {

} else {
    echo "Error updating status: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
