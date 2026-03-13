<?php

include "../config/db.php";

$crop = $_POST['crop'];
$min = $_POST['min'];
$max = $_POST['max'];

$sql = "SELECT target_price FROM alerts WHERE crop_name='$crop' LIMIT 1";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_assoc($result);

$price = $row['target_price'];

if($price >= $min && $price <= $max){

echo "✅ Current price ₹$price is within range. Farmer can SELL.";

}
else{

echo "❌ Current price ₹$price is outside range. Farmer cannot sell.";

}

}
else{

echo "⚠ Crop not found in database.";

}

?>