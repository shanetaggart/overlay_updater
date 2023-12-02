<!DOCTYPE html>
<html lang="en">

<head>

    <title>YTS Set Commentator Names</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Set the commentator names for the Y-Town Smash Overlay Updater.">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./includes/css/main.css" />

</head>

<body>

    <?php

    $left_commentator_name_file = 'overlay_files/data/left_commentator_name.txt';
    $right_commentator_name_file = 'overlay_files/data/right_commentator_name.txt';

    $left_commentator_name_placeholder = file_get_contents($left_commentator_name_file);
    $right_commentator_name_placeholder = file_get_contents($right_commentator_name_file);

    ?>

    <section>

        <picture>
            <img alt="Y-Town Smash Logo" src="/assets/images/Y-Town-Smash-Logo-v4.webp" width="200" height="200" />
        </picture>

        <h1>Set Commentator Names</h1>

        <?php include 'includes/blocks/nav.php'; ?>

        <form action="/includes/set_commentator_names.php" method="post" id="commentator_names_form">
            <aside>
                <label for="left_commentator_name">Left Commentator Name
                    <input type="text" name="left_commentator_name" id="left_commentator_name" maxlength="16" placeholder="<?php echo $left_commentator_name_placeholder; ?>" />
                </label>
                <label for="right_commentator_name">Right Commentator Name
                    <input type="text" name="right_commentator_name" id="right_commentator_name" maxlength="16" placeholder="<?php echo $right_commentator_name_placeholder; ?>" />
                </label>
            </aside>
            <input type="submit" value="Set Commentator Names" />
        </form>

    </section>

</body>

</html>