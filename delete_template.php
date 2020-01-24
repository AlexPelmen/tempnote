<?php 
    require __DIR__ . "/vard.php";
    require __DIR__ . "/config.php";
    require __DIR__ . "/tempclass.php";
    $Temp = new TempDB();
    $Temp->delete_template( $_POST[ "id" ] );

    $text = "The template with title \"".$_POST[ "title" ]."\" has just been added!"; 
    header("Location: done.php?text=$text");

