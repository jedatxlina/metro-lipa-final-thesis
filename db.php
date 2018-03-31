<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'metro_lipa_db';
$conn = new mysqli($host,$user,$pass,$db) or die($conn->error);
