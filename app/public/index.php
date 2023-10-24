<!DOCTYPE html>
<html lang="en">

<head>

	<title>YTS Overlay Updater</title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="A tool for updating the stream overlay for Y-Town Smash.">
	<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./includes/css/main.css" />
	<script type="text/javascript" src="./includes/js/characters.js"></script>
	<script type="text/javascript" src="./includes/js/main.js"></script>

</head>

<body>

	<section>

		<picture>
			<img alt="Y-Town Smash Logo" src="/assets/images/Y-Town%20Smash%20Logo.webp" width="200" height="200" />
		</picture>

		<h1>Overlay Updater</h1>

		<form action="/includes/update_data.php" method="post">

			<aside>
				<h2>Set Details</h2>
				<button id="form-reset">Reset</button>
			</aside>

			<label for="set_name">Set Name
				<input type="text" name="set_name" id="set_name" maxlength="16" />
			</label>

			<label for="best_of">Best Of
				<select name="best_of" id="best_of">
					<option value="" selected></option>
					<option value="best of 1">Best of 1</option>
					<option value="best of 3">Best of 3</option>
					<option value="best of 5">Best of 5</option>
				</select>
			</label>

			<aside>
				<label for="left_name">Left Name
					<input type="text" name="left_name" id="left_name" />
				</label>
				<label for="right_name">Right Name
					<input type="text" name="right_name" id="right_name" />
				</label>
			</aside>

			<h2>Match Details</h2>

			<aside>
				<label for="left_score">Left Score
					<input type="number" name="left_score" id="left_score" min="0" max="3" />
				</label>
				<label for="right_score">Right Score
					<input type="number" name="right_score" id="right_score" min="0" max="3" />
				</label>
				<label for="left_character">Left Character
					<select class="characters" name="left_character" id="left_character"></select>
				</label>
				<label for="right_character">Right Character
					<select class="characters" name="right_character" id="right_character"></select>
				</label>
			</aside>

			<div>
				<input type="submit" value="Update" />
			</div>

		</form>

	</section>

</body>

</html>