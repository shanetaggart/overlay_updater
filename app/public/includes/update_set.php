<?php

/**
 * Updates the set details by changing:
 *   -  set_name.txt
 *   -  best_of.txt
 *   -  left_name.txt
 *   -  right_name.txt
 */

// Store all of the information from the form.
$set_name = $_POST['set_name'];
$best_of = $_POST['best_of'];
$left_name = $_POST['left_name'];
$right_name = $_POST['right_name'];

// Store all of the file paths for the overlay files.
$set_name_path = '../overlay_files/set_name.txt';
$best_of_path = '../overlay_files/best_of.txt';
$left_name_path = '../overlay_files/left_name.txt';
$right_name_path = '../overlay_files/right_name.txt';

// Sanitize and convert text to uppercase.
if ($set_name !== '') {
    $set_name = trim($set_name);
    $set_name = strtoupper($set_name);
}

if ($best_of !== '') {
    $best_of = trim($best_of);
    $best_of = strtoupper($best_of);
}

if ($left_name !== '') {
    $left_name = trim($left_name);
    $left_name = strtoupper($left_name);
}

if ($right_name !== '') {
    $right_name = trim($right_name);
    $right_name = strtoupper($right_name);
}

// Open all of the text files that need updating.
if ($set_name !== '' && file_exists($set_name_path)) {
    $set_name_file = fopen($set_name_path, "w")
        or die("Unable to open file set_name.txt!");
}

if ($best_of !== '' && file_exists($best_of_path)) {
    $best_of_file = fopen($best_of_path, "w")
        or die("Unable to open file best_of.txt!");
}

if ($left_name !== '' && file_exists($left_name_path)) {
    $left_name_file = fopen($left_name_path, "w")
        or die("Unable to open file left_name.txt!");
}

if ($right_name !== '' && file_exists($right_name_path)) {
    $right_name_file = fopen($right_name_path, "w")
        or die("Unable to open file right_name.txt!");
}

// Write the data to the appropriate text files.
if (isset($set_name_file) && $set_name !== '') {
    fwrite($set_name_file, $set_name);
}

if (isset($best_of_file) && $best_of !== '') {
    fwrite($best_of_file, $best_of);
}

if (isset($left_name_file) && $left_name !== '') {
    fwrite($left_name_file, $left_name);
}

if (isset($right_name_file) && $right_name !== '') {
    fwrite($right_name_file, $right_name);
}

// Overwrite the text files and close them.
if (isset($set_name_file)) {
    fclose($set_name_file);
}

if (isset($best_of_file)) {
    fclose($best_of_file);
}

if (isset($left_name_file)) {
    fclose($left_name_file);
}

if (isset($right_name_file)) {
    fclose($right_name_file);
}

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
