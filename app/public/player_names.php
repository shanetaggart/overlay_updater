<!DOCTYPE html>
<html lang="en">

<head>

    <title>YTS Set Player Names</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Set the player names for the Y-Town Smash Overlay Updater.">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="http://localhost/overlay_updater/app/public/includes/css/main.css" />

</head>

<body>

    <?php  ?>

    <section>

        <picture>
            <img alt="Y-Town Smash Logo" src="http://localhost/overlay_updater/app/public/assets/images/teg-logo.webp" width="200" height="200" />
        </picture>

        <h1>Set Player Names</h1>

        <?php include 'includes/blocks/nav.php'; ?>


        <form action="http://localhost/overlay_updater/app/public/includes/set_player_names.php" method="post" id="player_names_form">
            <p class="instructions">Copy and Paste the player names into the textarea below. <span class="bold italics underlined">One name per line!</span>&nbsp;&nbsp;&nbsp;You can get a CSV export of the attendees from Start.gg by going to:<br />Settings (Admin) > Attendees > Export</p>
            <textarea id="player_names" name="player_names"></textarea>
            <input type="submit" value="Set Player Names" />
        </form>

    </section>

</body>

</html>