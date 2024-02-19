<?php

session_start();

session_destroy();

header("Location: homepageuser.php");
exit;
?>