<?php

session_start();

require("../helpers/DBConnection.php");
require("./class/Movies.php");
require("./class/MoviesService.php");
$moviesInstance = new Movies();
$moviesServiceInstance = new MoviesService();

if(isset($_POST['hiddenArray'])){
    $movieData = $_POST['hiddenArray'];
    $moviesServiceInstance->totalRent($movieData, 3);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Celuweb Movies Rent</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./vendors/rental-modal.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo navLink">Celuweb Movies</a>
            <button title="Abrir menu" id="toggleMenu" >
                <img
                    width=40px
                    height=40px
                    class="menuIcon"
                    src="./vendors/menu-icon.png" alt=""
                />
            </button>
            <ul class="navMenu">
                <?php 
                $genres = $moviesInstance->getGenres();
                
                foreach($genres as $key=>$value) {
                    print "<li class='navMenuItem'>";
                    print "<a href='#' class='navMenuLink navLink'>".$genres[$key]['genre_movie']."</a>";
                    print "</li>";
                }               
                ?>
            </ul>

            <div class="rental-popup">
                <button title="Alquilar" id="rental-cart" >
                    <img
                        width=50px
                        height=50px
                           src="./vendors/car.jpg" alt=""
                                                   />
                </button>
                <?php include "./rent-modal.php" ?>
            </div>

        </nav>
    </header>
        <ul class='grid'>
            <?php 
            $movies = $moviesInstance->getMovies();

            foreach($movies as $key=>$value) {
                $typePrice = $moviesServiceInstance->calculateMovieRent( $movies[$key]['release_date'] );
                // Se crea array con la informacion para calcular el alquiler
                $hiddenArray = [ 'type' => $typePrice[0], 'title' => $movies[$key]['title'], 'price' => $typePrice[1] ];
                print "<li class='card'>";
                print "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
                print "<div><strong name='price' style='color:yellow'>".$typePrice[0]."</strong></div>";
                print "<a href='#'>";
                print "<img class='cardImage' src='img/".$movies[$key]['image_path']."' width=200 height=250 alt='' />";
                print "</div>";
                print "</a>";
                print "<div class='cardFooter'>";
                print "<div><label>Título: </label><span class='cardTitle'><strong>".$movies[$key]['title']."</strong></span></div>";
                print "<div><label>Clasificación: <label><strong>".$movies[$key]['genre_movie']."</strong></div>";
                print "<div><label>Precio: <label><span class='cardType'>$".$typePrice[1]."</span></div>";
                print "</div>";
                // Se añade los valores del array al hidden.
                print "<input 
                    type='hidden' 
                    name='hiddenArray' 
                    value='".json_encode($hiddenArray, JSON_HEX_APOS).
                    "'>";
                print "<input type='submit' name='rent' class='rent-button' value='Alquilar'></button>";
                print "</form>";
                print "</li>";
            }
            ?>
        </ul>
        <script src="./vendors/rental-modal.js"></script>
</body>
</html>
