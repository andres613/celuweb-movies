<?php

require("../helpers/DBConnection.php");
require("./class/Movies.php");
require("./class/MoviesService.php");
$moviesInstance = new Movies();
$moviesServiceInstance = new MoviesService();

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
        <ul class='grid'>
            <?php 
            $movies = $moviesInstance->getMovies();

            foreach($movies as $key=>$value) {
                $typePrice = $moviesServiceInstance->calculateMovieRent( $movies[$key]['release_date'] );
                print "<li class='card'>";
                print "<div><strong style='color:yellow'>".$typePrice[0]."</strong></div>";
                print "<a href='#'>";
                print "<img class='cardImage' src='img/".$movies[$key]['image_path']."' width=200 height=250 alt='' />";
                print "</div>";
                print "</a>";
                print "<div class='card-footer'>";
                print "<div><label>Título: </label><span class='cardTitle'><strong>".$movies[$key]['title']."</strong></span></div>";
                print "<div><label>Clasificación: <label><strong>".$movies[$key]['genre_movie']."</strong></div>";
                print "<div><label>Precio: <label><span class='card-type'>$".$typePrice[1]."</span></div>";
                print "</div>";
                print "<div class='card-button'>";
                print "<input type='button' class='buyButton' value='Alquilar'></button>";
                print "</li>";
            }
            
            ?>
        </ul>
</body>
</html>
