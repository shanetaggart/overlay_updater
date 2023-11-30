<?php

// Create all necessary files in overlay_files if they don't exist.
$temp_files = [];

if (!file_exists($best_of_path)) {
    $temp_file_bo = fopen($best_of_path, 'w');
    array_push($temp_files, $temp_file_bo);
}

if (!file_exists($left_character_path)) {
    $temp_file_lc = fopen($left_character_path, 'w');
    array_push($temp_files, $temp_file_lc);
}

if (!file_exists($left_character_name_path)) {
    $temp_file_lcn = fopen($left_character_name_path, 'w');
    array_push($temp_files, $temp_file_lcn);
}

if (!file_exists($left_name_path)) {
    $temp_file_ln = fopen($left_name_path, 'w');
    array_push($temp_files, $temp_file_ln);
}

if (!file_exists($left_score_path)) {
    $temp_file_ls = fopen($left_score_path, 'w');
    array_push($temp_files, $temp_file_ls);
}

if (!file_exists($right_character_path)) {
    $temp_file_rc = fopen($right_character_path, 'w');
    array_push($temp_files, $temp_file_rc);
}

if (!file_exists($right_character_name_path)) {
    $temp_file_rcn = fopen($right_character_name_path, 'w');
    array_push($temp_files, $temp_file_rcn);
}

if (!file_exists($right_name_path)) {
    $temp_file_rn = fopen($right_name_path, 'w');
    array_push($temp_files, $temp_file_rn);
}

if (!file_exists($right_score_path)) {
    $temp_file_rs = fopen($right_score_path, 'w');
    array_push($temp_files, $temp_file_rs);
}

if (!file_exists($set_name_path)) {
    $temp_file_sn = fopen($set_name_path, 'w');
    array_push($temp_files, $temp_file_sn);
}

if (!file_exists($player_names_path)) {
    $temp_file_pn = fopen($player_names_path, 'w');
    array_push($temp_files, $temp_file_pn);
}

foreach ($temp_files as $file) {
    fclose($file);
}
