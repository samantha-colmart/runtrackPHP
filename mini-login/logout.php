<?php
session_destroy();
setcookie('username', '', time() - 3600, "/");
header("Location: index.php");
exit;