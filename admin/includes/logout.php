<?php
// function used to start session
session_start();

// function used to unset session
session_unset();

// function used to destroy session
session_destroy();

// The path which the script is redirected to when the session is destroyed.
header("Location: ../../cms-admin.php?session_killed_login_again");
?>