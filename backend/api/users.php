<?php

header("Content-Type: application/json");

include("../config/db.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($email=="" || $password==""){
echo json_encode([
"status"=>"error",
"message"=>"Missing data"
]);
exit;
}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if($result && $result->num_rows > 0){

echo json_encode([
"status"=>"success",
"message"=>"Login successful"
]);

}else{

echo json_encode([
"status"=>"error",
"message"=>"Invalid email or password"
]);

}

?>