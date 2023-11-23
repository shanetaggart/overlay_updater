<?php

$player_names = $_POST['player_names'];
$player_names_path = '../overlay_files/data/player_names.txt';

$player_names_file = fopen($player_names_path, "w");
fwrite($player_names_file, $player_names);
fclose($player_names_file);

// Redirect back to the main Overlay Updater page.
$form_url = '../index.php';
header('Location: ' . $form_url);
