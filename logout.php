<?php
session_start();
session_destroy();
unset($_SESSION["email"]);
unset($_SESSION["empno"]);
header("Location:sing.php");

?>