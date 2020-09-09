<?php

$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'bid_db';

// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);

// CHECK CONNECTION
if (!$conn) {
    die($error_msg);
}

// CREATE THE DATABASE
// $sql = "DROP DATABASE IF EXISTS $db";
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
    $conn = mysqli_connect($servername, $username, $password, $db);
} else {
    die($error_msg);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
	userId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(200) NOT NULL,
	email VARCHAR(200) NOT NULL,
	password VARCHAR(200) NOT NULL
	)";
// $sql = "DROP TABLE IF EXISTS users";
mysqli_query($conn, $sql);


$sql = "CREATE TABLE IF NOT EXISTS product (
	productId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pName VARCHAR(255),
	pDescription VARCHAR(255),
	pImage VARCHAR(255),
	pQuantity VARCHAR(255),
	pInitialCost VARCHAR(255),
	bCountDown TIMESTAMP
	)";
// $sql = "DROP TABLE IF EXISTS product";
mysqli_query($conn, $sql);


$sql = "CREATE TABLE IF NOT EXISTS bid (
	bidId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pBidCost VARCHAR(255),
	username VARCHAR(255),
	productId BIGINT UNSIGNED,
	userId BIGINT(20),
	FOREIGN KEY (productId) REFERENCES product(productId)
	)";
// $sql = "DROP TABLE IF EXISTS bid";
mysqli_query($conn, $sql);


$sql = "CREATE TABLE IF NOT EXISTS payments (
	bidId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	finalCost VARCHAR(255),
	address VARCHAR(255),
	city VARCHAR(255),
	country VARCHAR(255),
	zip VARCHAR(255),
	tel VARCHAR(255),
	productId BIGINT UNSIGNED,
	userId BIGINT UNSIGNED,
	FOREIGN KEY (productId) REFERENCES product(productId),
	FOREIGN KEY (userId) REFERENCES users(userId)
	)";
// $sql = "DROP TABLE IF EXISTS payments";
mysqli_query($conn, $sql);
