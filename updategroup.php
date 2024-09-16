<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    $gid = $_POST['gid'];
    $groupName = $_POST['groupname'];
    $fontsArray = $_POST['fontname'];
    $filePath = 'files/fontgroups.json';

}