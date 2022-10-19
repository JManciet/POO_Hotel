<?php

class Reservation 
{

    private Chambre $_chambre;
    private Client $_client;
    private DateTime $_dateArrivee;
    private DateTime $_dateDepart;

    public function __construct(Chambre $chambre, Client $client, string $dateArrivee, string $dateDepart){

        $this->_chambre = $chambre;
        $this->_client = $client;

        $this->_dateArrivee = new DateTime ($dateArrivee);
        $this->_dateDepart = new DateTime ($dateDepart);

        // $chambre->setReservation($this);
        $chambre->getHotel()->setReservations($this);
        $client->setReservations($this);
        $chambre->setDisponible(false);
    }


    public function getChambre():Chambre
    {
        return $this->_chambre;
    }

    public function setChambre(Chambre $chambre)
    {
        $this->_chambre = $chambre;
    }

    public function getClient():Client
    {
        return $this->_client;
    }

    public function setClient(Client $client)
    {
        $this->_client = $client;
    }

    public function getDateArrivee():DateTime
    {
        return $this->_dateArrivee;
    }

    public function setDateArrivee(String $dateArrivee)
    {
        $this->_dateArrivee = new DateTime ($dateArrivee);
    }

    public function getDateDepart():DateTime
    {
        return $this->_dateDepart;
    }

    public function setDateDepart($dateDepart)
    {
        $this->_dateDepart =  new DateTime ($dateDepart);
    }
}