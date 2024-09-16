<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gid = $_POST['gid'];
    $filePath = 'files/fontgroups.json';
    $jsonArray = [];
    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $jsonArray = json_decode($jsonContent, true) ?? [];
    }
    $jsonArray = array_filter($jsonArray, function ($group) use ($gid) {
        return $group['gid'] !== $gid;
    });
    file_put_contents($filePath, json_encode(array_values($jsonArray), JSON_PRETTY_PRINT));
    echo json_encode(['success' => true, 'message' => 'Group deleted successfully!']);
}
