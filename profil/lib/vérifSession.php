<?php 
    session_start(); 
    if(!isset($_SESSION['admin']) && !isset($_SESSION["user"])){
        header("Location: ../index.php");
        exit();
    }