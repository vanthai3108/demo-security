<?php
session_start();

if(isset($_SESSION['Username']) && $_SESSION['Username'] != NULL){
    unset($_SESSION['Username']);
}
    echo "<script>window.open('index.php','_self')</script>";
?>