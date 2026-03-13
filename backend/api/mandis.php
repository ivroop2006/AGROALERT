<?php

include "../config/db.php";

header("Content-Type: application/json");

$query = "SELECT * FROM mandis";

$result = mysqli_query($conn,$query);

$data = [];

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
}

echo json_encode($data);

?>