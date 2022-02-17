<?php
session_start();
include('function.php');

unset($_SESSION['IS_USERLOGIN']);
    redirect('userlogin.php');    
?>