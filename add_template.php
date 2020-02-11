<?php 
    require __DIR__ . "/vard.php";
    require __DIR__ . "/config.php";
    require __DIR__ . "/tempclass.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $Temp = new TempDB();
    $Temp->add_template( $_POST[ "title" ], $_POST[ "text" ] );

    $text = "The template with title \"".$_POST[ "title" ]."\" has just been added!"; 
    header("Location: done.php?text=$text");

