<head>
    <title>Templates</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
    <script  src="js/jquery.js" ></script>
    <script  src="bootstrap/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/style.css"/>

    <script  src="js/interface.js" ></script>    
</head>
<div class = "container" >
    <form class = "form input-form w-75 mx-auto my-3 card bg-light" >
        <h1 class = "h2 text-center m-3" >Templates</h1>
        <input type="text" class ="search-string form-control w-75 p-3 m-3 mx-auto" required placeholder="Search" name="search" id = "search" />
        <div class = "form__button-set" >
            <input type="submit" class = "btn submit btn-primary w-25 p-2 m-3 mx-auto" value = "Search" />
            <a class = "btn submit btn-primary w-25 p-2 m-3 mx-auto" href = "add.php"  >Add</a>
        </div>
    </form>
    <div class = "response w-75 mx-auto my-3 card bg-light" >     
        <div class="response__element">
            <div class="element__header">Nothing</div>
            <div class="element__body">
                There is absolutely nothing
            </div>
        </div>
    </div>
</div>
