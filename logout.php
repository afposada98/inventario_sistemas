<?php
session_start();
unset($_SESSION['P06']);
session_destroy();
header("Location: ./index.php");
?>