<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <?php

spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});


$hotelRegentParis = new Hotel("Regent **** Paris","10 rue de la Bruillère 74400 STRASBOURG");


$hotelHiltonStrasbourg = new Hotel("Hilton **** Strasbourg","10 route de la Gare 67400 STRASBOURG");

$chambreHiltonStrasbourg1 = new Chambre(1,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg2 = new Chambre(2,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg3 = new Chambre(3,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg4 = new Chambre(4,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg5 = new Chambre(5,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg6 = new Chambre(6,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg7 = new Chambre(7,$hotelHiltonStrasbourg,120,2,false);
$chambreHiltonStrasbourg8 = new Chambre(8,$hotelHiltonStrasbourg,300,1,true);

$clientMM = new Client("MURMANN","Micka");
$clientVG = new Client("GIBELLO","Virgile");

$reservationVG = new Reservation($chambreHiltonStrasbourg8,$clientVG,"2021-01-01","2021-01-02");
$reservationMM = new Reservation($chambreHiltonStrasbourg3,$clientMM,"2021-03-11","2021-03-15");
$reservationMM2 = new Reservation($chambreHiltonStrasbourg4,$clientMM,"2021-04-01","2021-04-17");

echo $hotelHiltonStrasbourg->getInfos();

echo $hotelHiltonStrasbourg->getInfosReservations();

echo $hotelRegentParis->getInfosReservations();

echo $clientMM->getInfosReservations();

echo $clientVG->getInfosReservations();

echo $hotelHiltonStrasbourg->getInfosChambres();

// if($hotelHiltonStrasbourg->getChambres()[0]->get_reservation()==null)
// echo "Chambre vide";
// else
// echo $hotelHiltonStrasbourg->getChambres()[0]->get_reservation()->getClient();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>