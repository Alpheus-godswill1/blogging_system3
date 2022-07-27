<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../cms-admin.php?session_killed_login_again");
?>