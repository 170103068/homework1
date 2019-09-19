<?php
// this for connect db where dbname is user
$dsn = 'mysql:host=localhost;dbname=user';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}