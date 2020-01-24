<?php 
    require __DIR__ . "/vard.php";
    require __DIR__ . "/config.php";
    require __DIR__ . "/tempclass.php";
    $Temp = new TempDB();
    $test = $Temp->update_template( $_POST[ "id" ], $_POST[ "title" ], $_POST[ "text" ] );

    $text = "The template with title \"$title\" has just been updated!"; 
    header("Location: done.php?text=$text");

