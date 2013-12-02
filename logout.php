<?php

// This files purpose is to destroy the users session, basically signing them out as the name suggests

session_start();
session_destroy();
header("location: index.php");

?>