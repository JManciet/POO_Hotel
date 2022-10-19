<?php

class Client 
{


    private string $_nom;
    private string $_prenom;
    private array $_reservations  = [];
    
    public function __construct( string $nom , string $prenom){

        $this->_nom = $nom;
        $this->_prenom = $prenom;
        
    }

    public function __toString():string
        {
            return $this->_prenom." ".$this->_nom;
        }
    

    public function getNom():string
    {
        return $this->_nom;
    }

    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }

    public function getPrenom():string
    {
        return $this->_prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getReservations():Reservation
    {
        return $this->_reservations;
    }

    public function setReservations(Reservation $reservation)
    {
       array_push($this->_reservations,$reservation);
    }

    public function getInfosReservations():string
    {

        $result = "<br><strong>Réservations de $this </strong><br>
        <span class='badge text-bg-success'>".sizeof($this->_reservations)." RESERVATION".(sizeof($this->_reservations)>1?"S":"")."</span><br>";

        $prixTotal = 0;

        foreach($this->_reservations as $reservation)
        {
            $chambre = $reservation->getChambre();
            $result .= "<strong>Hotel : ".$chambre->getHotel()."</strong> / Chambre : ".$chambre->getNumero()." (".$chambre->getNbrLits()." lit".($chambre->getNbrLits()>1?"s":"")." - ".$chambre->getPrix()." € - Wifi : ".($chambre->getWifi()?"oui":"non").") du ".$reservation->getDateArrivee()->format('d-m-Y')." au ".$reservation->getDateDepart()->format('d-m-Y')."<br>";
            $nbrJour = date_diff($reservation->getDateArrivee(),$reservation->getDateDepart())->format('%d');
            $prixTotal += $nbrJour*$reservation->getChambre()->getPrix();
        }

        return $result."Total : ".$prixTotal." €<br>";
    }
}