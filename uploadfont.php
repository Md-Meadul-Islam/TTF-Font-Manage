<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['font'])) {
    $uploadDir = 'fonts/';
    $allowedTypes = ['ttf'];
    $font = $_FILES['font'];
    $fontName = basename($font['name']);
    $fontExtension = strtolower(pathinfo($fontName, PATHINFO_EXTENSION));
    if (in_array($fontExtension, $allowedTypes)) {
        $uploadFilePath = $uploadDir . $fontName;
        if (file_exists($uploadFilePath)) {
            echo json_encode([
                'success' => false,
                'message' => 'Font already exists in the directory.'
            ]);
        } else {
            if (move_uploaded_file($font['tmp_name'], $uploadFilePath)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Font Uploaded Successfully !',
                    'fontName' => explode('.', $fontName)[0],
                    'fontPath' => $uploadFilePath
                ]);
            } else {
                echo json_encode(['success' => true, 'message' => 'Failed to upload file.']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Only TTF allowed !']);
    }
}