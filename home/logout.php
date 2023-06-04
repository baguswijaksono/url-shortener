<?php
// Start the session
session_start();

// Destroy the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to another page after logout
header("Location: /eslolin");
exit();
?>
