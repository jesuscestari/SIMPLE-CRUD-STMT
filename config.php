<?php
session_start();
include 'Clases/db.php';

$DB_HOST= "localhost";
$DB_NAME="personas";
$DB_USER="root";
$DB_PASS= "";

//errores
ini_set("display_errors",1);
error_reporting(E_ALL);


$con = new db($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$conexion = $con->getConn();
