<?php

session_unset();
session_destroy();
unset($_SESSION['username']);
Header('location:login.php');
?>