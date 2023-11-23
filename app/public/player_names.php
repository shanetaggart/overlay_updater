<!DOCTYPE html>
<html lang="en">

<head>

    <title>YTS Set Player Names</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Set the player names for the Y-Town Smash Overlay Updater.">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./includes/css/main.css" />

</head>

<body>

    <?php  ?>

    <section>

        <h1>Set Player Names</h1>

        <p class="breadcrumb"><a href="index.php">Overlay Updater</a> / <a href="player_names.php">Set Player Names</a></p>

        <p class="instructions">Copy and Paste the player names into the textarea below. <span class="bold italics underlined">One name per line!</span><br />You can get a CSV export of the attendees from Start.gg by going to:<br />Settings > Attendees > Export</p>

        <form action="/includes/set_player_names.php" method="post" id="player_names_form">
            <textarea id="player_names" name="player_names"></textarea>
            <input type="submit" value="Set Player Names" />
        </form>

    </section>

</body>

</html>