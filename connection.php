<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_covid_db";

if(!$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Failed to connect!");
}
