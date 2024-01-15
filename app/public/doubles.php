<!DOCTYPE html>
<html lang="en">

<head>

	<title>YTS Overlay Updater</title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="A tool for updating the stream overlay for Y-Town Smash.">
	<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://localhost/overlay_updater/app/public/includes/css/main.css" />
	<script type="text/javascript" src="http://localhost/overlay_updater/app/public/includes/js/characters.js"></script>
	<script type="text/javascript" src="http://localhost/overlay_updater/app/public/includes/js/main.js"></script>

</head>

<body>

	<?php

	$set_name_file = './overlay_files/set_name.txt';
	$best_of_file = './overlay_files/best_of.txt';
	$player_names_file = './overlay_files/data/player_names.txt';
	$player_1_name_file = './overlay_files/player_1_name.txt';
	$player_2_name_file = './overlay_files/player_2_name.txt';
	$player_3_name_file = './overlay_files/player_3_name.txt';
	$player_4_name_file = './overlay_files/player_4_name.txt';
	$player_1_score_file = './overlay_files/player_1_score.txt';
	$player_2_score_file = './overlay_files/player_2_score.txt';
	$player_3_score_file = './overlay_files/player_3_score.txt';
	$player_4_score_file = './overlay_files/player_4_score.txt';

	if (!file_exists($player_1_name_file)) {
		$player_1 = fopen($player_1_name_file, "w");
		fwrite($player_1, "PLAYER 1");
		fclose($player_1);
	}

	if (!file_exists($player_2_name_file)) {
		$player_2 = fopen($player_2_name_file, "w");
		fwrite($player_2, "PLAYER 1");
		fclose($player_2);
	}

	if (!file_exists($player_3_name_file)) {
		$player_3 = fopen($player_3_name_file, "w");
		fwrite($player_3, "PLAYER 1");
		fclose($player_3);
	}

	if (!file_exists($player_4_name_file)) {
		$player_4 = fopen($player_4_name_file, "w");
		fwrite($player_4, "PLAYER 1");
		fclose($player_4);
	}

	if (!file_exists($player_1_score_file)) {
		$player_1_score = fopen($player_1_score_file, "w");
		fwrite($player_1_score, "0");
		fclose($player_1_score);
	}

	if (!file_exists($player_2_score_file)) {
		$player_2_score = fopen($player_2_score_file, "w");
		fwrite($player_2_score, "0");
		fclose($player_2_score);
	}

	if (!file_exists($player_3_score_file)) {
		$player_3_score = fopen($player_3_score_file, "w");
		fwrite($player_3_score, "0");
		fclose($player_3_score);
	}

	if (!file_exists($player_4_score_file)) {
		$player_4_score = fopen($player_4_score_file, "w");
		fwrite($player_4_score, "0");
		fclose($player_4_score);
	}

	$set_name_placeholder = file_get_contents($set_name_file);
	$best_of_placeholder = file_get_contents($best_of_file);
	$player_1_name_placeholder = file_get_contents($player_1_name_file);
	$player_2_name_placeholder = file_get_contents($player_2_name_file);
	$player_3_name_placeholder = file_get_contents($player_3_name_file);
	$player_4_name_placeholder = file_get_contents($player_4_name_file);
	$player_1_score_placeholder = file_get_contents($player_1_score_file);
	$player_2_score_placeholder = file_get_contents($player_2_score_file);
	$player_3_score_placeholder = file_get_contents($player_3_score_file);
	$player_4_score_placeholder = file_get_contents($player_4_score_file);

	if (!file_exists($player_names_file)) {
		$player_names = fopen($player_names_file, "w");
		fwrite($player_names, "PLACEHOLDER NAMES\nSET PLAYER NAMES");
		fclose($player_names);
	}

	$player_names = file_get_contents($player_names_file);
	$player_names = explode("\n", trim($player_names));

	?>

	<section>

		<picture>
			<img alt="Y-Town Smash Logo" src="http://localhost/overlay_updater/app/public/assets/images/teg-logo.webp" width="200" height="200" />
		</picture>

		<h1>Doubles</h1>

		<?php include 'includes/blocks/nav.php'; ?>

		<form action="http://localhost/overlay_updater/app/public/includes/update_data_doubles.php" method="post" id="form">

			<h2>Match Details</h2>

			<label for="set_name">Set Name
				<input type="text" name="set_name" id="set_name" maxlength="16" placeholder="<?php echo $set_name_placeholder; ?>" />
			</label>

			<label for="best_of">Best Of
				<select name="best_of" id="best_of">
					<option value=""><?php echo $best_of_placeholder; ?></option>
					<option value="best of 1">Best of 1</option>
					<option value="best of 3">Best of 3</option>
					<option value="best of 5">Best of 5</option>
				</select>
			</label>

			<aside class="doubles">
				<div class="doubles-player doubles-player-1">
					<label for="player_1_name">Player 1
						<select class="names" name="player_1_name" id="player_1_name">
							<option value=""><?php echo $player_1_name_placeholder; ?></option>
							<?php
							foreach ($player_names as $player) {
								echo '<option value="' . $player . '" id="' . $player . '">' . $player . '</option>';
							}
							?>
						</select>
					</label>
					<label for="player_1_score">Player 1 Score
						<div class="score-wrapper">
							<span class="score-buttons minus left">&minus;</span>
							<input type="number" name="player_1_score" id="player_1_score" class="score" min="0" max="3" placeholder="<?php echo $player_1_score_placeholder; ?>" />
							<span class="score-buttons plus left">&plus;</span>
						</div>
					</label>
				</div>
				<div class="doubles-player doubles-player-2">
					<label for=" player_2_name">Player 2
						<select class="names" name="player_2_name" id="player_2_name">
							<option value=""><?php echo $player_2_name_placeholder; ?></option>
							<?php
							foreach ($player_names as $player) {
								echo '<option value="' . $player . '" id="' . $player . '">' . $player . '</option>';
							}
							?>
						</select>
					</label>
					<label for="player_2_score">Player 2 Score
						<div class="score-wrapper">
							<span class="score-buttons minus right">&minus;</span>
							<input type="number" name="player_2_score" id="player_2_score" class="score" min="0" max="3" placeholder="<?php echo $player_2_score_placeholder; ?>" />
							<span class="score-buttons plus right">&plus;</span>
						</div>
					</label>
				</div>
				<div class="doubles-player doubles-player-3">
					<label for="player_3_name">Player 3
						<select class="names" name="player_3_name" id="player_3_name">
							<option value=""><?php echo $player_3_name_placeholder; ?></option>
							<?php
							foreach ($player_names as $player) {
								echo '<option value="' . $player . '" id="' . $player . '">' . $player . '</option>';
							}
							?>
						</select>
					</label>
					<label for="player_3_score">Player 3 Score
						<div class="score-wrapper">
							<span class="score-buttons minus right">&minus;</span>
							<input type="number" name="player_3_score" id="player_3_score" class="score" min="0" max="3" placeholder="<?php echo $player_3_score_placeholder; ?>" />
							<span class="score-buttons plus right">&plus;</span>
						</div>
					</label>
				</div>
				<div class="doubles-player doubles-player-4">
					<label for="player_4_name">Player 4
						<select class="names" name="player_4_name" id="player_4_name">
							<option value=""><?php echo $player_4_name_placeholder; ?></option>
							<?php
							foreach ($player_names as $player) {
								echo '<option value="' . $player . '" id="' . $player . '">' . $player . '</option>';
							}
							?>
						</select>
					</label>
					<label for="player_4_score">Player 4 Score
						<div class="score-wrapper">
							<span class="score-buttons minus right">&minus;</span>
							<input type="number" name="player_4_score" id="player_4_score" class="score" min="0" max="3" placeholder="<?php echo $player_4_score_placeholder; ?>" />
							<span class="score-buttons plus right">&plus;</span>
						</div>
					</label>
				</div>
			</aside>

			<div class="submit-doubles">
				<input type="submit" value="Update" id="form-submit" />
			</div>

		</form>

	</section>

</body>

</html>