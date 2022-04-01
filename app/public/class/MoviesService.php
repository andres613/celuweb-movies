<?php

class MoviesService {

    private $total;

    public function __construct(){}

    public function calculateMovieRent ( $releaseDate ) {
        $totalDifferenceMonths = $this->differenceDate( $releaseDate );
        if( $totalDifferenceMonths < 6 ) {
            return [ "Nueva", 6000 ];
        }
        if( $totalDifferenceMonths < 120  ) {
            return [ "Normal", 4000 ];
        }
        if( $totalDifferenceMonths > 120 ) {
            return [ "Clásica", 2000 ];
        }
    }

    public function differenceDate ( $releaseDate ) {
        $rDate=new DateTime($releaseDate);
        $currentDate = date("Y-m-d");
        $cDate = new DateTime($currentDate);
        # obtener diferencia entre las fechas
        $interval = $rDate->diff($cDate);
        # obtener diferencia en meses
        $differenceInMonths = $interval->format("%m");
        # obtener diferencia en años, multiplicar por 12 para obtener los meses
        $differenceInYears = $interval->format("%y")*12;
        $totalDifferenceMonths = $differenceInMonths + $differenceInYears;
        return $totalDifferenceMonths;
    }

    public function totalRent ( $movieData, $numberDays ) {
        $items = json_decode($movieData, true);
        if( $items['type'] == "Nueva" ){
            $this->total = $this->total + $items['price'] * $numberDays;
        } elseif( $items['type'] == "Normal" ){
            if( $numberDays <= 3 ) {
                $this->total = $this->total + $items['price'] * $numberDays;
            } else {
                $this->total = $this->total + $items['price'] * $numberDays + ($items['price'] * 15/100)($numberDays-3);
            }
        }elseif( $numberDays <= 5 ){
            $this->total = $this->total + $items['price'] * $numberDays;
        } else {
            $this->total = $this->total + $items['price'] * $numberDays + ($items['price'] * 10/100)($numberDays-5);
        }
        $_SESSION["total"] = $_SESSION["total"] + $this->total;
        print $_SESSION["total"];
    }

    public function getTotal() {
        /* return $_SESSION["total"]; */
    }

}

?>
