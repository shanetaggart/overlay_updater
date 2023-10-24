<?php

// Store all of the file paths for the overlay files.
$best_of_path = '../overlay_files/best_of.txt';
$left_character_path = '../overlay_files/left_character.png';
$left_name_path = '../overlay_files/left_name.txt';
$left_score_path = '../overlay_files/left_score.txt';
$right_character_path = '../overlay_files/right_character.png';
$right_name_path = '../overlay_files/right_name.txt';
$right_score_path = '../overlay_files/right_score.txt';
$set_name_path = '../overlay_files/set_name.txt';

// Create all necessary files in overlay_files.
$best_of_file = fopen($best_of_path, 'w');
$left_character_file = fopen($left_character_path, 'w');
$left_name_file = fopen($left_name_path, 'w');
$left_score_file = fopen($left_score_path, 'w');
$right_character_file = fopen($right_character_path, 'w');
$right_name_file = fopen($right_name_path, 'w');
$right_score_file = fopen($right_score_path, 'w');
$set_name_file = fopen($set_name_path, 'w');

// Write the default data for the overlay_files.
fwrite($best_of_file, 'BEST OF 3');
fwrite($left_name_file, 'PLAYER 1');
fwrite($right_name_file, 'PLAYER 2');
fwrite($right_score_file, '0');
fwrite($set_name_file, 'WINNER\'S FINALS');
fwrite($left_score_file, '0');

// Create a 3D array of character duos/rivalries.
$character_duos = [
    ['mario.png', 'bowser.png'],
    ['cloud.png', 'sephiroth.png'],
    ['pit.png', 'darkpit.png'],
    ['samus.png', 'darksamus.png'],
    ['donkeykong.png', 'kingkrool.png'],
    ['fox.png', 'wolf.png'],
    ['kirby.png', 'kingdedede.png'],
    ['link.png', 'ganondorf.png'],
    ['kirby.png', 'metaknight.png'],
    ['luigi.png', 'piranhaplant.png'],
    ['pokemontrainer.png', 'mewtwo.png'],
    ['samus.png', 'ridley.png'],
    ['yoshi.png', 'bowserjunior.png']
];

// Choose a random duo/rivalry.
$duo = rand(0, count($character_duos));

// Set the default images for the left and right characters to the randomly chosen duo/rivalry.
copy('../assets/characters/left/' . $character_duos[$duo][0], '../overlay_files/left_character.png');
copy('../assets/characters/right/' . $character_duos[$duo][1], '../overlay_files/right_character.png');

// Close all open streams.
array_map('fclose', get_resources('stream'));

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
