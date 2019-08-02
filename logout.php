<?php
session_start();
// Destroying All Sessions
// Redirecting To Home Page
session_destroy() ? header("Location: index.php"):"";
?>