
<head>
    <title>Templates</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
    <script  src="js/jquery.js" ></script>
    <script  src="bootstrap/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/style.css"/>

    <script  src="js/interface.js" ></script>    
</head>
<div class = "container" >
    <form class = "form  w-75 mx-auto my-3 card bg-light" method = "POST" action = "add_template.php" >
        <h1 class = "h2 text-center m-3" >Add new template</h1>
        <input type="text" class ="search-string form-control w-75 p-3 m-3 mx-auto" required placeholder="title" name="title" id = "title" />
        <textarea class = "form-textarea form-control w-75 p-2 m-2 mx-auto" placeholder = "Text" name = "text" ></textarea>
        <div class = "form__button-set p-5" >
            <input type="submit" class = "btn submit btn-primary w-25 p-2 m-3 mx-auto" value = "Add" />
            <a class = "btn submit btn-secondary w-25 p-2 m-3 mx-auto" href = "index.php"  >Cancel</a>
        </div>
    </form>
</div>    
