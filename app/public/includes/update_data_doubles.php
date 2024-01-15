<?php

// Store all of the information from the form.
$set_name = $_POST['set_name'];
$best_of = $_POST['best_of'];
$player_1_name = $_POST['player_1_name'];
$player_2_name = $_POST['player_2_name'];
$player_3_name = $_POST['player_3_name'];
$player_4_name = $_POST['player_4_name'];
$player_1_score = $_POST['player_1_score'];
$player_2_score = $_POST['player_2_score'];
$player_3_score = $_POST['player_3_score'];
$player_4_score = $_POST['player_4_score'];

// Store all of the file paths for the overlay files.
$set_name_path = '../overlay_files/set_name.txt';
$best_of_path = '../overlay_files/best_of.txt';
$player_1_name_path = '../overlay_files/player_1_name.txt';
$player_2_name_path = '../overlay_files/player_2_name.txt';
$player_3_name_path = '../overlay_files/player_3_name.txt';
$player_4_name_path = '../overlay_files/player_4_name.txt';
$player_1_score_path = '../overlay_files/player_1_score.txt';
$player_2_score_path = '../overlay_files/player_2_score.txt';
$player_3_score_path = '../overlay_files/player_3_score.txt';
$player_4_score_path = '../overlay_files/player_4_score.txt';
$player_names_path = '../overlay_files/data/player_names.txt';

// Convert a score of zero to a hyphen if the set is best of 1.
if (strtolower($best_of) == 'best of 1') {
    $left_score = '-';
    $right_score = '-';
}

// Sanitize and convert text to uppercase.
if ($set_name !== '') {
    $set_name = trim($set_name);
    $set_name = strtoupper($set_name);
}

if ($best_of !== '') {
    $best_of = trim($best_of);
    $best_of = strtoupper($best_of);

    // Convert a score of zero to a hyphen if the set is best of 1.
    if ($best_of == 'best of 1') {
        $left_score = '-';
        $right_score = '-';
    }
}

if ($player_1_name !== '') {
    $player_1_name = trim($player_1_name);
    $player_1_name = strtoupper($player_1_name);
}

if ($player_2_name !== '') {
    $player_2_name = trim($player_2_name);
    $player_2_name = strtoupper($player_2_name);
}

if ($player_3_name !== '') {
    $player_3_name = trim($player_3_name);
    $player_3_name = strtoupper($player_3_name);
}

if ($player_4_name !== '') {
    $player_4_name = trim($player_4_name);
    $player_4_name = strtoupper($player_4_name);
}

if ($player_1_score !== '') {
    $player_1_score = trim($player_1_score);
    $player_1_score = strtoupper($player_1_score);
}

if ($player_2_score !== '') {
    $player_2_score = trim($player_2_score);
    $player_2_score = strtoupper($player_2_score);
}

if ($player_3_score !== '') {
    $player_3_score = trim($player_3_score);
    $player_3_score = strtoupper($player_3_score);
}

if ($player_4_score !== '') {
    $player_4_score = trim($player_4_score);
    $player_4_score = strtoupper($player_4_score);
}

// Open all of the text files that need updating, and store it for easier access.
$open_files = [];

if ($set_name !== '' && file_exists($set_name_path)) {
    $set_name_file = fopen($set_name_path, "w");
    array_push($open_files, $set_name_file);
}

if ($best_of !== '' && file_exists($best_of_path)) {
    $best_of_file = fopen($best_of_path, "w");
    array_push($open_files, $best_of_file);
}

if ($player_1_name !== '' && file_exists($player_1_name_path)) {
    $player_1_name_file = fopen($player_1_name_path, "w");
    array_push($open_files, $player_1_name_file);
}

if ($player_2_name !== '' && file_exists($player_2_name_path)) {
    $player_2_name_file = fopen($player_2_name_path, "w");
    array_push($open_files, $player_2_name_file);
}

if ($player_3_name !== '' && file_exists($player_3_name_path)) {
    $player_3_name_file = fopen($player_3_name_path, "w");
    array_push($open_files, $player_3_name_file);
}

if ($player_4_name !== '' && file_exists($player_4_name_path)) {
    $player_4_name_file = fopen($player_4_name_path, "w");
    array_push($open_files, $player_4_name_file);
}

if ($player_1_score !== '' && file_exists($player_1_score_path)) {
    $player_1_score_file = fopen($player_1_score_path, "w");
    array_push($open_files, $player_1_score_file);
}

if ($player_2_score !== '' && file_exists($player_2_score_path)) {
    $player_2_score_file = fopen($player_2_score_path, "w");
    array_push($open_files, $player_2_score_file);
}

if ($player_3_score !== '' && file_exists($player_3_score_path)) {
    $player_3_score_file = fopen($player_3_score_path, "w");
    array_push($open_files, $player_3_score_file);
}

if ($player_4_score !== '' && file_exists($player_4_score_path)) {
    $player_4_score_file = fopen($player_4_score_path, "w");
    array_push($open_files, $player_4_score_file);
}


// Write the data to the appropriate text files.
if (isset($set_name_file) && $set_name !== '') {
    fwrite($set_name_file, $set_name);
}

if (isset($best_of_file) && $best_of !== '') {
    fwrite($best_of_file, $best_of);
}

if (isset($player_1_name_file) && $player_1_name !== '') {
    fwrite($player_1_name_file, $player_1_name);
}

if (isset($player_2_name_file) && $player_2_name !== '') {
    fwrite($player_2_name_file, $player_2_name);
}

if (isset($player_3_name_file) && $player_3_name !== '') {
    fwrite($player_3_name_file, $player_3_name);
}

if (isset($player_4_name_file) && $player_4_name !== '') {
    fwrite($player_4_name_file, $player_4_name);
}

if (isset($player_1_score_file) && $player_1_score !== '') {
    fwrite($player_1_score_file, $player_1_score);
}

if (isset($player_2_score_file) && $player_2_score !== '') {
    fwrite($player_2_score_file, $player_2_score);
}

if (isset($player_3_score_file) && $player_3_score !== '') {
    fwrite($player_3_score_file, $player_3_score);
}

if (isset($player_4_score_file) && $player_4_score !== '') {
    fwrite($player_4_score_file, $player_4_score);
}

// Close all open files.
foreach ($open_files as $file) {
    fclose($file);
}

// Redirect back to the main Overlay Updater page.
$form_url = 'http://localhost/overlay_updater/app/public/doubles.php';
header('Location: ' . $form_url);
