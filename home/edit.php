<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$newUrl = $_POST['newUrl'];
$urlId = $_POST['urlId'];
$query = "UPDATE `url` SET `originUrl` = '".$newUrl."' WHERE `url`.`id` = ".$urlId.";";
$result = mysqli_query($conn, $query);
if ($result) {
    
} else {
    echo "Error updating status: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
