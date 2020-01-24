<?php
    require __DIR__ . "/tempclass.php";
    require __DIR__ . "/vard.php";

    $id = isset( $_POST[ "id" ] ) ? $_POST[ "id" ] : false;
    if( $id ){
        $Temp = new TempDB();
        $template = $Temp->get_by_id( $id );
        $title = $template[ "title" ];
        $text = $template[ "text" ]; 
    }
    
?>
<head>
    <title>Templates</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
    <script  src="js/jquery.js" ></script>
    <script  src="bootstrap/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/style.css"/>

    <script  src="js/load_template.js" ></script>    
</head>
<div class = "container" >
    <form class = "form  w-75 mx-auto my-3 card bg-light" method = "POST" action = "edit_template.php" >

        <?php if( $id ): ?>

            <h1 class = "h2 text-center m-3" >Edit template</h1>
            <input type="text" class ="search-string form-control w-75 p-3 m-3 mx-auto" required placeholder="title" name="title" id = "title" value = "<?=$title?>" />
            <textarea class = "form-textarea form-control w-75 p-2 m-2 mx-auto" placeholder = "Text" name = "text" ><?=$text?></textarea>
            <div class = "form__button-set p-5" >
                <input type = "hidden" name = "id" value = "<?=$id?>" />
                <input type="submit" class = "btn submit btn-primary w-25 p-2 m-3 mx-auto" value = "Add" />
                <a class = "btn submit btn-secondary w-25 p-2 m-3 mx-auto" href = "index.php"  >Cancel</a>
            </div>

        <?php else: ?>

            <h1 class = "h2 text-center m-3" >Error has been occured</h1>
            <div class = "form__button-set p-5" >
                <a class = "btn submit btn-secondary w-25 p-2 m-3 mx-auto" href = "index.php"  >Cancel</a>
            </div>

        <?php endif; ?>

    </form>
</div>    
