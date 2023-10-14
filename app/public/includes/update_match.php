<?php

/**
 * Updates the match details by changing:
 *   -  left_score.txt
 *   -  left_character.png
 *   -  right_score.txt
 *   -  right_character.png
 */

// Store all of the information from the form.
$left_score = $_POST['left_score'];
$left_character = $_POST['left_character'];
$right_score = $_POST['right_score'];
$right_character = $_POST['right_character'];

// Store all of the file paths for the overlay files.
$left_score_path = '../overlay_files/left_score.txt';
$left_character_path = '../overlay_files/left_character.png';
$right_score_path = '../overlay_files/right_score.txt';
$right_character_path = '../overlay_files/right_character.png';

// Store the file path for the character assets.
$character_asset_path = '../assets/characters/';

// Sanitize and convert text to uppercase.
if ($left_score !== '') {
    $left_score = trim($left_score);
    $left_score = strtoupper($left_score);
}

if ($right_score !== '') {
    $right_score = trim($right_score);
    $right_score = strtoupper($right_score);
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
if ($left_score !== '' && file_exists($left_score_path)) {
    $left_score_file = fopen($left_score_path, "w")
        or die("Unable to open file left_score.txt!");
}

if ($right_score !== '' && file_exists($right_score_path)) {
    $right_score_file = fopen($right_score_path, "w")
        or die("Unable to open file right_score.txt!");
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
if (isset($left_score_file) && $left_score !== '') {
    fwrite($left_score_file, $left_score);
}

if (isset($right_score_file) && $right_score !== '') {
    fwrite($right_score_file, $right_score);
}

// Overwrite the text files and close them.
if (isset($left_score_file)) {
    fclose($left_score_file);
}

if (isset($right_score_file)) {
    fclose($right_score_file);
}

// Redirect back to the main Overlay Updater page.
$form_url = 'https://overlay-updater.local/index.php';
header('Location: ' . $form_url);
