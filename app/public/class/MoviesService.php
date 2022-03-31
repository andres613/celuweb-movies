<?php

class MoviesService {

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

}

?>
