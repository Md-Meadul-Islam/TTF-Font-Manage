<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $groupName = htmlspecialchars($_POST['groupname']);
    $fontsArray = $_POST['fontname'];
    $storeDir = 'files/';
    $storeIntoFile = 'fontgroups.json';

    if (!file_exists($storeDir)) {
        mkdir($storeDir, 0777, true);
    }

    $data = [
        'uid' => generateUId(),
        'group_name' => $groupName,
        'fonts' => $fontsArray
    ];
    $filePath = $storeDir . $storeIntoFile;
    $jsonArray = [];

    if (file_exists($filePath)) {
        // Get existing data from the file
        $jsonContent = file_get_contents($filePath);
        $jsonArray = json_decode($jsonContent, true) ?? [];
    }
    $jsonArray[] = $data;
    file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));

    echo json_encode(['success' => true, 'message' => 'Font group saved successfully!']);
}
function generateUId()
{
    $time = microtime(true);
    $timeHex = dechex($time * 1000000);
    $randomHex = bin2hex(random_bytes(8));
    return substr($timeHex, -8) . '-' . substr($randomHex, 0, 4) . '-' . substr($randomHex, 4, 4);
}