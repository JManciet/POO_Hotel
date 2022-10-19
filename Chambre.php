<?php

class Chambre 
{

    private int $_numero;
    private Hotel $_hotel;
    private float $_prix;
    private int $_nbrLits;
    private bool $_wifi;
    private bool $_disponible = true;

    // private $_reservation = null;


    public function __construct( int $numero , Hotel $hotel  , float $prix, int $nbrLits, bool $wifi){


        $this->_numero = $numero;
        $this->_hotel = $hotel;
        $this->_prix = $prix;
        $this->_nbrLits = $nbrLits;
        $this->_wifi = $wifi;

        $hotel->setChambres($this);

    }

    
    public function getNumero():int
    {
        return $this->_numero;
    }

    public function setNumero(int $numero)
    {
        $this->_numero = $numero;
    }

    public function getHotel():Hotel
    {
        return $this->_hotel;
    }

    public function setHotel(Hotel $hotel)
    {
        $this->_hotel = $hotel;
    }


    public function getPrix():float
    {
        return $this->_prix;
    }

    public function setPrix(float $prix)
    {
        $this->_prix = $prix;
    }

    public function getNbrLits():int
    {
        return $this->_nbrLits;
    }

    public function setNbrLits(int $nbrLits)
    {
        $this->_nbrLits = $nbrLits;
    }

    public function getWifi():bool
    {
        return $this->_wifi;
    }

    public function setWifi(bool $wifi)
    {
        $this->_wifi = $wifi;
    }

    public function getDisponible():bool
    {
        return $this->_disponible;
    }

    public function setDisponible(bool $disponible)
    {
        $this->_disponible = $disponible;
    }

    // public function getReservation()
    // {
    //     return $this->_reservation;
    // }
 
    // public function setReservation($reservation)
    // {
    //     $this->_reservation = $reservation;
    // }

}