
<?php

$apiUrl = "https://secretapi.ldc.com/api/secret";
$apiToken = "qsldkjhlihcklqjdslkqs12qsd456qsd123qsd"; 

$payload = [
    "QueryKey1" => "Secret",
    "QueryKey2" => "Secret2"
];

$ch = curl_init($apiUrl);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer {$apiToken}",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload)
]);

$response = curl_exec($ch);

if ($response === false) {
    $error = curl_error($ch);
    curl_close($ch);
    die("cURL Error: " . $error);
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Optional: decode JSON response
$responseData = json_decode($response, true);

echo "HTTP Status: {$httpCode}\n";
print_r($responseData);

