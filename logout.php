<?php
include_once 'login.php';
session_destroy();
header("location: login.php");
?>