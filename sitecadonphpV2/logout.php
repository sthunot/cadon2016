<?php
session_start();
$_session=array();
session_destroy();
header('Location:index.php');
exit();
?>
