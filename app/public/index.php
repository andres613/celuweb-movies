<?php

require("../helpers/DBConnection.php");
require("./class/Movies.php");
$moviesInstance = new Movies();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo nav-link">Celuweb Movies</a>
            <button title="Abrir menu" id="toggleMenu" >
                <img
                    width=40px
                    height=40px
                    class="menu-icon"
                    src="./vendors/menu-icon.png" alt=""
                />
            </button>
            <ul class="nav-menu">
                <?php 
                $genres = $moviesInstance->getGenres();
                
                foreach($genres as $key=>$value) {
                    print "<li class='nav-menu-item'>";
                    print "<a href='#' class='nav-menu-link nav-link'>".$genres[$key]['genre_movie']."</a>";
                    print "</li>";
                }               
                ?>
            </ul>
        </nav>
    </header>
</body>
</html>
