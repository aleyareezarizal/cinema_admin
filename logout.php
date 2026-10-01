<?php

session_start();
session_unset();

session_destroy(); //end session

header("Location: login.php"); //redirect to login page
exit();

?>