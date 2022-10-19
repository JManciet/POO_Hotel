<?php

class Hotel 
{

    private string $_nom;
    private string $_adresse;
    private array $_chambres = [];
    private array $_reservations  = [];

    public function __construct( string $nom , string $adresse){

        $this->_nom = $nom;
        $this->_adresse = $adresse;
        
    }

    public function __toString():string
    {
        return $this->_nom;
    }
 
    public function getNom():string
    {
        return $this->_nom;
    }

    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }

    public function getAdresse():string
    {
        return $this->_adresse;
    }

    public function setAdresse(string $adresse)
    {
        $this->_adresse = $adresse;
    }

    public function getChambres():Chambre
    {
        return $this->_chambres;
    }

    public function setChambres(Chambre $chambres)
    {
        array_push ($this->_chambres , $chambres);
    }

    public function getReservations():Reservation
    {
        return $this->_reservations;
    }

    public function setReservations(Reservation $reservation)
    {
        array_push($this->_reservations, $reservation);
    }

    public function getInfos():string
    {
        return "<br><strong>$this->_nom</strong><br>
        Nombre de chambres: ".sizeof($this->_chambres)."<br>
        Nombre de chambres réservées: ".sizeof($this->_reservations)."<br>
        Nombre de chambres dispo:".(sizeof($this->_chambres)-sizeof($this->_reservations))."<br>" ;
    }

    public function getInfosReservations():string
    {

        $result = "<br><strong>Reservation de l'hôtel $this->_nom</strong><br>";

        if(sizeof($this->_reservations)==0){
            $result .= "Aucune réservation !<br>";
        }else{
        $result .= "<span class='badge text-bg-success'>".sizeof($this->_reservations)." RESERVATION".(sizeof($this->_reservations)>1?"S":"")."</span><br>";
        foreach($this->_reservations as $reservation)
        {
            $result .= $reservation->getClient()." - Chambre ".$reservation->getChambre()->getNumero()." - du ".$reservation->getDateArrivee()->format('d-m-Y')." au ".$reservation->getDateDepart()->format('d-m-Y')."<br>";
        }
        }

        return $result;
        
    }

    public function getInfosChambres():string
    {

        $result = "<br>Statuts des chambre de <strong>$this->_nom</strong><br>
        
        <table class='table table-striped'>
  <thead>
    <tr>
      <th scope='col'>CHAMBRE</th>
      <th scope='col'>PRIX</th>
      <th scope='col'>WIFI</th>
      <th scope='col'>ETAT</th>
    </tr>
  </thead>
  <tbody>";
    
        
        foreach($this->_chambres as $chambre)
        {

            $result .= "<tr>
            <th scope='row'>Chambre ".$chambre->getNumero()."</th>
            <td>".$chambre->getPrix()."</td>
            <td>".($chambre->getWifi()?"<i class='bi bi-wifi'></i>":"")."</td>".
            ($chambre->getDisponible()? "<td><span class='badge text-bg-success'>DISPONIBLE</span>":"<td><span class='badge text-bg-danger'>RESERVE</span>")."<br></td>
          </tr>";

            // $result .= 'Chambre ".$chambre->getNumero()." - ".$chambre->getPrix()." - ".$chambre->getWifi()." - ".$chambre->getDisponible()."<br>";
        }

        return $result."</tbody>
        </table>";
        
    }


}