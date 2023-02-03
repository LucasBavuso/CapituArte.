<?php
@session_start();
if(!isset($_SESSION["email"]) || $_SESSION["email"]==""){
    header("Location: desconectado.php");
    die();
}
?>