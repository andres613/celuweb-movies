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

}

?>
