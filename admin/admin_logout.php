<?php

require_once('start_session.php');

session_unset();
session_destroy();


header('Location: admin_login.php');
exit();
?>
