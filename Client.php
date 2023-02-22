<?php


Class Client {
    
    private string $nom;
    private string $prenom;
    private array $reservation = [];

    public function __construct ( $nom, $prenom)

    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> reservation = [];
    }
    
    //GETTERS and SETTERS

    public function getnom ()
    {
        
    return $this-> nom;
    
    }

    public function setnom ($nom)

    {
    return $this -> nom = $nom;

    }

    public function getprenom ()
    {
        return $this -> prenom;
    }

    public function setprenom ($prenom)
    {
         return $this -> prenom = $prenom;
    }
    
    //FONCTIONS********************************

    public function addResa ($reservation)
    {
    $this-> reservation[] = $reservation;
    }
   


    public function prixTotal()
    {
    $prixTotal=0;
    foreach($this->reservation as $reservation) 
        $prixTotal+=$reservation->getChambre()->getPrix();
        
    return $prixTotal;
    }




    public function nbResaClient () // compte le nombre de reservations d'un client 
    {
        
            $i = 0;
            foreach ($this->reservation as $reservation) 
            {
                $i++;
            }
            return $i;
        
    }

    public function infoResaclient()
    { 
        echo "Réservation du client ".$this->getprenom() ." " .$this->getnom() . " <br> " .$this->nbResaclient() ." RESERVATION(S)" . "<br>";
        if (0==count($this->reservation)) 
        {
            echo "Aucune reservation ";
        } else 
        {
        foreach ($this->reservation as $reservations) 
        {
        echo $reservations->getChambre()->getHotel() .$reservations->getChambre(). $reservations->getChambre()->getnbLits().$reservations->getChambre()->getPrix()."€ - Wifi : ".$reservations->getChambre()->getWifi();
     } 
    }
    if (0<count($this->reservation))
    {
        echo "Total : ". $this->prixTotal()." € ";
    } 

}
}  
