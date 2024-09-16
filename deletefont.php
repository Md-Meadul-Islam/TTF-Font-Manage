<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fontName = $_POST['font'];
    $filePath = 'fonts/' . $fontName . '.ttf';
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo json_encode(['success' => true, 'message' => 'Font deleted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Could not delete the font.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: Font not found.']);
    }
}