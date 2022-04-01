<?php

class Movies {

    private $id;
    private $user_id;
    private $genre_id;
    private $title;
    private $overvie;
    private $releaseDate;
    private $inExistence;

    public function __construct(){}

    public function getGenres(){
        $db = new Connection();
        $movieGenres = $db->dbResponse("SELECT * FROM Genres");
        $db->close();
        unset($db);
        return $movieGenres;
    }

    public function getMovies() {
        $db = new Connection();
        $movies = $db->dbResponse("SELECT m.id, m.user_id, m.genre_id, m.image_path, m.title, m.overview, m.release_date, m.in_existence, g.genre_movie FROM Movies m LEFT JOIN Genres g ON m.genre_id = g.id");
        $db->close();
        unset($db);
        return $movies;
    }

}

?>
