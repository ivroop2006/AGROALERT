<?php

header("Content-Type: application/json");

include("../config/db.php");

/* Get data */

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm'] ?? '';
$village = $_POST['village'] ?? '';

$name = trim($name);
$email = trim($email);
$password = trim($password);
$confirm = trim($confirm);
$village = trim($village);

/* Check empty */

if($name=="" || $email=="" || $password=="" || $confirm=="" || $village==""){
echo json_encode([
"status"=>"error",
"message"=>"All fields required"
]);
exit;
}

/* Password match */

if($password != $confirm){
echo json_encode([
"status"=>"error",
"message"=>"Passwords do not match"
]);
exit;
}

/* Check existing user */

$check = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

echo json_encode([
"status"=>"error",
"message"=>"User already exists"
]);
exit;

}

/* Insert user */

$sql = "INSERT INTO users (name,email,password,village)
VALUES ('$name','$email','$password','$village')";

if(mysqli_query($conn,$sql)){

echo json_encode([
"status"=>"success",
"message"=>"Registration successful"
]);

}else{

echo json_encode([
"status"=>"error",
"message"=>mysqli_error($conn)   // shows real database error
]);

}

?>