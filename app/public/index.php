<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="./includes/main.css" />
	<script type="text/javascript" src="./includes/characters.js"></script>
	<script type="text/javascript" src="./includes/main.js"></script>
</head>

<body>
	<section>
		<h1>Overlay Updater</h1>
		<form action="https://overlay-updater.local/includes/update_set.php" method="post">
			<h2>Set Details</h2>
			<label for="set_name">Set Name</label>
			<input type="text" name="set_name" id="set_name" maxlength="16" tabindex="1" />
			<label for="best_of">Best Of</label>
			<select name="best_of" tabindex="2">
				<option></option>
				<option>Best of 1</option>
				<option>Best of 3</option>
				<option>Best of 5</option>
			</select>
			<section>
				<aside>
					<label for="left_name">Left Name</label>
					<input type="text" name="left_name" tabindex="3" />
				</aside>

				<aside>
					<label for="right_name">Right Name</label>
					<input type="text" name="right_name" tabindex="4" />
				</aside>
			</section>

			<input type="submit" value="Update" tabindex="5" />
		</form>

		<form action="https://overlay-updater.local/includes/update_match.php" method="post">
			<h2>Match Details</h2>
			<section>
				<aside>
					<label for="left_score">Left Score</label>
					<input type="number" name="left_score" min="0" max="5" tabindex="6" />
					<label for="left_character">Left Character</label>
					<select class="characters" name="left_character" tabindex="8"></select>
				</aside>

				<aside>
					<label for="right_score">Right Score</label>
					<input type="number" name="right_score" min="0" max="5" tabindex="7" />
					<label for="right_character">Right Character</label>
					<select class="characters" name="right_character" tabindex="9"></select>
				</aside>
			</section>
			<input type="submit" value="Update" tabindex="10" />
		</form>
	</section>
</body>

</html>