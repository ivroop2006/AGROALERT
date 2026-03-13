<?php

header("Content-Type: application/json");

include("../config/db.php");

/* Get form data */

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$email = trim($email);
$password = trim($password);

/* Check empty fields */

if($email=="" || $password==""){
echo json_encode([
"status"=>"error",
"message"=>"Please fill all fields"
]);
exit;
}

/* Check user in database */

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 0){

echo json_encode([
"status"=>"error",
"message"=>"User not found"
]);
exit;

}

/* Fetch user data */

$user = mysqli_fetch_assoc($result);

/* Check password */

if($user['password'] == $password){

echo json_encode([
"status"=>"success",
"message"=>"Login successful"
]);

}else{

echo json_encode([
"status"=>"error",
"message"=>"Incorrect password"
]);

}

?>