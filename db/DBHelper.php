<?php
require_once ('config.php');

/**
 * Su dung cho lenh: insert/update/delete
 */
function execute($sql) {
	// Them du lieu vao database
	//B1. Mo ket noi toi database
	//$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset($conn, 'utf8');

	//B2. Thuc hien truy van insert
	if ($conn->query($sql) === TRUE) {
		// echo "New record created successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	  
	//B3. Dong ket noi database
	mysqli_close($conn);
}
/**
 * Su dung cho lenh: select
 */
function executeResult($sql) {
	// Them du lieu vao database
	//B1. Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset($conn, 'utf8');

	//B2. Thuc hien truy van insert
	$resultset = $conn->query($sql);
	
	$data      = [];

	if ($resultset->num_rows > 0){
		while ($row = $resultset->fetch_assoc()) {
			$data[] = $row;
		}
	}
	
	//B3. Dong ket noi database
	mysqli_close($conn);

	return $data;
}
function countRecord($sql){ //Dem so ban ghi
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error){
		die("Connect fail:" . $conn->connect_error);
	}
	$resultset = $conn->query($sql);
	return $resultset->num_rows;
}