<?php

/**
 * Updates the match details by changing:
 *   -  best_of.txt
 *   -  left_character.png
 *   -  left_name.txt
 *   -  left_score.txt
 *   -  right_character.png
 *   -  right_name.txt
 *   -  right_score.txt
 *   -  set_name.txt
 */

// Store all of the information from the form.
$best_of = $_POST['best_of'];
$left_character = $_POST['left_character'];
$left_name = $_POST['left_name'];
$left_score = $_POST['left_score'];
$right_character = $_POST['right_character'];
$right_name = $_POST['right_name'];
$right_score = $_POST['right_score'];
$set_name = $_POST['set_name'];

// Store all of the file paths for the overlay files.
$best_of_path = '../overlay_files/best_of.txt';
$left_character_path = '../overlay_files/left_character.png';
$left_name_path = '../overlay_files/left_name.txt';
$left_score_path = '../overlay_files/left_score.txt';
$right_character_path = '../overlay_files/right_character.png';
$right_name_path = '../overlay_files/right_name.txt';
$right_score_path = '../overlay_files/right_score.txt';
$set_name_path = '../overlay_files/set_name.txt';

// Create all necessary files in overlay_files
fopen($best_of_path, 'w');
fopen($left_character_path, 'w');
fopen($left_name_path, 'w');
fopen($left_score_path, 'w');
fopen($right_character_path, 'w');
fopen($right_name_path, 'w');
fopen($right_score_path, 'w');
fopen($set_name_path, 'w');

// Close all open streams.
array_map('fclose', get_resources('stream'));

// Store the file path for the character assets.
$character_asset_path = '../assets/characters/';

// Convert a score of zero to a hyphen if the set is best of 1.
if (strtolower($best_of) == 'best of 1') {
    $left_score = '-';
    $right_score = '-';
}

// Sanitize and convert text to uppercase.
if ($best_of !== '') {
    $best_of = trim($best_of);
    $best_of = strtoupper($best_of);
}

if ($left_name !== '') {
    $left_name = trim($left_name);
    $left_name = strtoupper($left_name);
}

if ($left_score !== '') {
    $left_score = trim($left_score);
    $left_score = strtoupper($left_score);
}

if ($right_name !== '') {
    $right_name = trim($right_name);
    $right_name = strtoupper($right_name);
}

if ($right_score !== '') {
    $right_score = trim($right_score);
    $right_score = strtoupper($right_score);
}

if ($set_name !== '') {
    $set_name = trim($set_name);
    $set_name = strtoupper($set_name);
}

// Sanitize and convert character names to image file names.
if ($left_character !== '') {
    $left_character = strtolower($left_character);
    $left_character = str_replace(' ', '', $left_character);
    $left_character = $left_character . '.png';
}

if ($right_character !== '') {
    $right_character = strtolower($right_character);
    $right_character = str_replace(' ', '', $right_character);
    $right_character = $right_character . '.png';
}

// Open all of the text files that need updating.
if ($best_of !== '' && file_exists($best_of_path)) {
    $best_of_file = fopen($best_of_path, "w")
        or die("Unable to open file best_of.txt!");
}

if ($left_name !== '' && file_exists($left_name_path)) {
    $left_name_file = fopen($left_name_path, "w")
        or die("Unable to open file left_name.txt!");
}

if ($left_score !== '' && file_exists($left_score_path)) {
    $left_score_file = fopen($left_score_path, "w")
        or die("Unable to open file left_score.txt!");
}

if ($right_name !== '' && file_exists($right_name_path)) {
    $right_name_file = fopen($right_name_path, "w")
        or die("Unable to open file right_name.txt!");
}

if ($right_score !== '' && file_exists($right_score_path)) {
    $right_score_file = fopen($right_score_path, "w")
        or die("Unable to open file right_score.txt!");
}

if ($set_name !== '' && file_exists($set_name_path)) {
    $set_name_file = fopen($set_name_path, "w")
        or die("Unable to open file set_name.txt!");
}

// Copy the image files and replace the placeholders.
if (
    $left_character !== ''
    && file_exists($character_asset_path . 'left/' . $left_character)
    && file_exists($left_character_path)
) {
    copy('../assets/characters/left/' . $left_character, '../overlay_files/left_character.png');
}

if (
    $right_character !== ''
    && file_exists($character_asset_path . 'right/' . $right_character)
    && file_exists($right_character_path)
) {
    copy('../assets/characters/right/' . $right_character, '../overlay_files/right_character.png');
}

// Write the data to the appropriate text files.
if (isset($best_of_file) && $best_of !== '') {
    fwrite($best_of_file, $best_of);
}

if (isset($left_name_file) && $left_name !== '') {
    fwrite($left_name_file, $left_name);
}

if (isset($left_score_file) && $left_score !== '') {
    fwrite($left_score_file, $left_score);
}

if (isset($right_name_file) && $right_name !== '') {
    fwrite($right_name_file, $right_name);
}

if (isset($right_score_file) && $right_score !== '') {
    fwrite($right_score_file, $right_score);
}

if (isset($set_name_file) && $set_name !== '') {
    fwrite($set_name_file, $set_name);
}

// Overwrite the text files and close them.
if (isset($best_of_file)) {
    fclose($best_of_file);
}

if (isset($left_name_file)) {
    fclose($left_name_file);
}

if (isset($left_score_file)) {
    fclose($left_score_file);
}

if (isset($right_name_file)) {
    fclose($right_name_file);
}

if (isset($right_score_file)) {
    fclose($right_score_file);
}

if (isset($set_name_file)) {
    fclose($set_name_file);
}

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
