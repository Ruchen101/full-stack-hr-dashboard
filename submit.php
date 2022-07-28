<?php
//includes path to db-inc.php file so we can call $dbConnection  variable in index.php
include_once 'db-inc.php';

//get the value that user types in for each each input field from home.php
$employeeNumber = $_POST["employee-number"];
$firstName = $_POST["first-name"];
$lastName = $_POST["last-name"];
$position = $_POST["position"];
$department = $_POST["department"];
$email = $_POST["email"];
$salary = $_POST["salary"];


//sql statement to insert data into from form using POST variables above from fields
$sqlInsert = "INSERT INTO employees (employeeNumber,firstName, lastName,jobTitle,departmentCode, email, salary) values ('$employeeNumber','$firstName', '$lastName','$position','$department' ,'$email','$salary');";

// insert data into database
mysqli_query($dbConnection, $sqlInsert);

//refresh home.php by specifying path file path
header("Location:index.php?submission=success")


 ?>
