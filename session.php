<?php
session_start();

$_SESSION['user'] = "Sumit Kumar";   // creating a session variable and giving it a value.
echo  $_SESSION["user"];  //printing thesession value.

session_unset();  // to destroy the session created before
echo $_SESSION["user"];
?>