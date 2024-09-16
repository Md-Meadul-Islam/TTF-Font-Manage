<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gid = $_POST['gid'];
    $groupName = $_POST['groupname'];
    $fontsArray = $_POST['fontname'];
    $filePath = 'files/fontgroups.json';

    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $jsonArray = json_decode($jsonContent, true) ?? [];
        $updated = false;
        foreach ($jsonArray as &$group) {
            if ($group['gid'] === $gid) {
                $group['group_name'] = $groupName;
                $group['fonts'] = $fontsArray;
                $updated = true;
                break;
            }
        }
        if ($updated) {
            file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
            echo json_encode(['success' => true, 'message' => 'Group updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Group not found']);
        }
    }
}