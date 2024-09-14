<?php
$directory = __DIR__ . "/files";
$fileArr = [];
if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
            if (!is_dir($directory . "/" . $file)) {
                $fileArr[] = $file;
            }
        }
        closedir($dh);
    }
}
echo json_encode(['success' => true, 'fonts' => $fileArr]);