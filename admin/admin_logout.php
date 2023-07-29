<?php
// logout.php

// Include the file to start the session

require_once('start_session.php');
// Clear all session data and destroy the session
session_unset();
session_destroy();

// Redirect to the login page or any other appropriate page
header('Location: admin_login.php');
exit();
?>
