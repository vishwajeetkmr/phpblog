<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location : index.php");
}else {
include "includes/header.php";
include "includes/footer.php";
}
 