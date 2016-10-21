<?php

function checkLogin(){
    session_start();

    if(!isset($_SESSION['myusername'])){
        header("Location:login.php");
    }
}