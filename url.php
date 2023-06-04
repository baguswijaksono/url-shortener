<?php
$id = $_GET['id'];
$content = getContentById($id);
function getContentById($id) {
    return $id;
}
require_once 'config.php';
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
$query = "SELECT originUrl FROM url WHERE shortUrl = '$content'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error executing the query: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$originUrl = isset($row['originUrl']) ? $row['originUrl'] : null;
mysqli_close($conn);
if (!empty($originUrl)) {
    header("Location: $originUrl");
    exit();
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>404</title>
        <!-- Google font -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:300,700' rel='stylesheet'>
        <!-- Custom stlylesheet -->
        <link type='text/css' rel='stylesheet' href='css/style.css' />
    </head>
    <body>
        <div id='notfound'>
            <div class='notfound'>
                <div class='notfound-404'>
                    <h1>4<span></span>4</h1>
                </div>
                <h2>Oops! Page Not Be Found</h2>
                <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
                <a href='/eslolin'>Back to homepage</a>
            </div>
        </div>
    </body>
    </html>
    ";
}
?>
