<?php

$left_commentator_name = $_POST['left_commentator_name'];
$right_commentator_name = $_POST['right_commentator_name'];

$left_commentator_name_path = '../overlay_files/data/left_commentator_name.txt';
$right_commentator_name_path = '../overlay_files/data/right_commentator_name.txt';

$left_commentator_name_file = fopen($left_commentator_name_path, "w");
$right_commentator_name_file = fopen($right_commentator_name_path, "w");

fwrite($left_commentator_name_file, strToUpper($left_commentator_name));
fwrite($right_commentator_name_file, strToUpper($right_commentator_name));

fclose($left_commentator_name_file);
fclose($right_commentator_name_file);

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
