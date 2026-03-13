<?php
header('Content-Type: application/json');

$api_key = "579b464db66ec23bdd000001b377e4b96af044ab5d9e33d287a584b9";

// Fetch latest 500 records from Agmarknet
$url = "https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=".$api_key."&format=json&limit=500";

$response = file_get_contents($url);
$data = json_decode($response, true);

// Return JSON directly
echo json_encode($data);
?>