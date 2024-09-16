<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $filePath = 'files/fontgroups.json';
    $jsonArray = [];

    if (file_exists($filePath)) {
        // Get existing data from the file
        $jsonContent = file_get_contents($filePath);
        $jsonArray = json_decode($jsonContent, true) ?? [];
    }
    if (!empty($jsonArray)) {
        echo json_encode(['success' => true, 'data' => $jsonArray]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No Groups Found !']);
    }
}