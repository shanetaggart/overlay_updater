<!DOCTYPE html>
<html>

<head>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./includes/css/main.css" />
	<script type="text/javascript" src="./includes/js/characters.js"></script>
	<script type="text/javascript" src="./includes/js/main.js"></script>

</head>

<body>

	<?php

	$best_of_path = 'overlay_files/best_of.txt';
	$left_character_name_path = 'overlay_files/left_character_name.txt';
	$left_name_path = 'overlay_files/left_name.txt';
	$left_score_path = 'overlay_files/left_score.txt';
	$right_character_name_path = 'overlay_files/right_character_name.txt';
	$right_name_path = 'overlay_files/right_name.txt';
	$right_score_path = 'overlay_files/right_score.txt';
	$set_name_path = 'overlay_files/set_name.txt';

	$best_of_placeholder = file_get_contents($best_of_path);
	$left_character_name_placeholder = file_get_contents($left_character_name_path);
	$left_name_placeholder = file_get_contents($left_name_path);
	$left_score_placeholder = file_get_contents($left_score_path);
	$right_character_name_placeholder = file_get_contents($right_character_name_path);
	$right_name_placeholder = file_get_contents($right_name_path);
	$right_score_placeholder = file_get_contents($right_score_path);
	$set_name_placeholder = file_get_contents($set_name_path);

	?>

	<section>

		<h1>Overlay Updater</h1>

		<form action="/includes/update_data.php" method="post">

			<aside>
				<h2 id="heading">Set Details</h2>
				<button id="form-reset">Reset</button>
			</aside>

			<label for="set_name">Set Name
				<input type="text" name="set_name" id="set_name" maxlength="16" placeholder="<?php echo $set_name_placeholder; ?>" />
			</label>

			<label for="best_of">Best Of
				<select name="best_of" id="best_of" required>
					<option disabled selected value=""><?php echo $best_of_placeholder; ?></option>
					<option value="best of 1">Best of 1</option>
					<option value="best of 3">Best of 3</option>
					<option value="best of 5">Best of 5</option>
				</select>
			</label>

			<aside>
				<label for="left_name">Left Name
					<input type="text" name="left_name" id="left_name" placeholder="<?php echo $left_name_placeholder; ?>" />
				</label>
				<label for="right_name">Right Name
					<input type="text" name="right_name" id="right_name" placeholder="<?php echo $right_name_placeholder; ?>" />
				</label>
			</aside>

			<h2>Match Details</h2>

			<aside>
				<label for="left_score" id="left_score_wrapper">Left Score
					<input type="number" name="left_score" id="left_score" min="0" max="3" placeholder="<?php echo $left_score_placeholder; ?>" />
				</label>
				<label for="right_score" id="right_score_wrapper">Right Score
					<input type="number" name="right_score" id="right_score" min="0" max="3" placeholder="<?php echo $right_score_placeholder; ?>" />
				</label>
				<label for="left_character" id="left_character_wrapper">Left Character
					<select class="characters" name="left_character" id="left_character" required>
						<option disabled selected value=""><?php echo $left_character_name_placeholder; ?></option>
					</select>
				</label>
				<label for="right_character" id="right_character_wrapper">Right Character
					<select class="characters" name="right_character" id="right_character" required>
						<option disabled selected value=""><?php echo $right_character_name_placeholder; ?></option>
					</select>
				</label>
				<img id="left_character_image" src="overlay_files/left_character.png" />
				<img id="right_character_image" src="overlay_files/right_character.png" />
			</aside>

			<div>
				<input type="submit" value="Update" id="form-submit" />
			</div>

		</form>

	</section>

</body>

</html>