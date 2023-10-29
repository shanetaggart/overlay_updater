<?php

/**
 * Creates any missing files and resets the set and match details for:
 *   -  best_of.txt
 *   -  left_character.png
 *   -  left_character_name.txt
 *   -  left_name.txt
 *   -  left_score.txt
 *   -  right_character.png
 *   -  right_character_name.txt
 *   -  right_name.txt
 *   -  right_score.txt
 *   -  set_name.txt
 */

// Store all of the file paths for the overlay files.
$best_of_path = '../overlay_files/best_of.txt';
$left_character_path = '../overlay_files/left_character.png';
$left_character_name_path = '../overlay_files/left_character_name.txt';
$left_name_path = '../overlay_files/left_name.txt';
$left_score_path = '../overlay_files/left_score.txt';
$right_character_path = '../overlay_files/right_character.png';
$right_character_name_path = '../overlay_files/right_character_name.txt';
$right_name_path = '../overlay_files/right_name.txt';
$right_score_path = '../overlay_files/right_score.txt';
$set_name_path = '../overlay_files/set_name.txt';

// Create all necessary files in overlay_files.
$best_of_file = fopen($best_of_path, 'w');
$left_character_file = fopen($left_character_path, 'w');
$left_character_name_file = fopen($left_character_name_path, 'w');
$left_name_file = fopen($left_name_path, 'w');
$left_score_file = fopen($left_score_path, 'w');
$right_character_file = fopen($right_character_path, 'w');
$right_character_name_file = fopen($right_character_name_path, 'w');
$right_name_file = fopen($right_name_path, 'w');
$right_score_file = fopen($right_score_path, 'w');
$set_name_file = fopen($set_name_path, 'w');

// Store the open files for easier access.
$open_files = [];
array_push(
    $open_files,
    $best_of_file,
    $left_character_file,
    $left_character_name_file,
    $left_name_file,
    $left_score_file,
    $right_character_file,
    $right_character_name_file,
    $right_name_file,
    $right_score_file,
    $set_name_file
);

// Write the default data for the text files.
fwrite($best_of_file, 'BEST OF 3');
fwrite($left_name_file, 'PLAYER 1');
fwrite($right_name_file, 'PLAYER 2');
fwrite($right_score_file, '0');
fwrite($set_name_file, 'WINNER\'S FINALS');
fwrite($left_score_file, '0');

// Create a 3D array of character rivalries.
$character_rivals = [
    [['chrom'],                         ['robin']],
    [['cloud'],                         ['sephiroth']],
    [['diddykong', 'donkeykong'],       ['kingkrool']],
    [['fox'],                           ['wolf']],
    [['kirby'],                         ['kingdedede', 'metaknight']],
    [['link', 'toonlink', 'younglink'], ['ganondorf']],
    [['luigi'],                         ['piranhaplant']],
    [['mario'],                         ['bowser', 'wario']],
    [['pit'],                           ['darkpit']],
    [['pokemontrainer'],                ['mewtwo']],
    [['ryu'],                           ['ken']],
    [['samus'],                         ['darksamus', 'ridley']],
    [['yoshi'],                         ['bowserjunior']]
];

// Choose a random rivalry.
$rivals = $character_rivals[array_rand($character_rivals)];
$left_rival = $rivals[0][array_rand($rivals[0])];
$right_rival = $rivals[1][array_rand($rivals[1])];


// Set the default images using the slected rivalry.
copy('../assets/characters/left/' . $left_rival . '.png', '../overlay_files/left_character.png');
copy('../assets/characters/right/' . $right_rival . '.png', '../overlay_files/right_character.png');

// Set the default character names using the slected rivalry.
fwrite($left_character_name_file, $left_rival);
fwrite($right_character_name_file, $right_rival);

// Close all open files.
foreach ($open_files as $file) {
    fclose($file);
}

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
