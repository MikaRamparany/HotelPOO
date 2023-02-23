<?php


Class Client {
    
    private string $nom;
    private string $prenom;
    private array $reservations = [];

    public function __construct ( $nom, $prenom)

    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> reservations = [];
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
    $this-> reservations[] = $reservation;
    }
   


    public function prixTotal()
    {
    $prixTotal=0;
    foreach($this->reservations as $reservation) 
        $prixTotal+=$reservation->getChambre()->getPrix();
        
    return $prixTotal;
    }




    public function nbResaClient () // compte le nombre de reservations d'un client 
    {
        
            $i = 0;
            foreach ($this->reservations as $reservation) 
            {
                $i++;
            }
            return $i;
        
    }

    public function infoResaclient()
    { 
        echo "Réservations du client ".$this->getprenom() ." " .$this->getnom() . " <br> " .$this->nbResaclient() ." RESERVATION(S)" . "<br>";
        if (0==count($this->reservations)) 
        {
            echo "Aucune reservation ";
        } else 
        {
        foreach ($this->reservations as $reservation) 
        {
            $hasWifi = ($reservation->getChambre()->getWifi() ) ? "oui" : "non"; // Ecriture ternaire, soit raccourcis pour if et else lorsque les instructions sont courtes.

        echo $reservation->getChambre()->getHotel() ." / " .$reservation->getChambre(). " / (".$reservation->getChambre()->getnbLits()." - " .$reservation->getChambre()->getPrix()."€ - Wifi : ".$hasWifi. ")  ".$reservation ."<br>";
        } 
        }
    if (0<count($this->reservations))
        {
        echo " Total : ". $this->prixTotal()." €. ";
        } 
     
    }

public function __toString()
    {
    return $this-> nom . $this-> prenom;
    }
}  
