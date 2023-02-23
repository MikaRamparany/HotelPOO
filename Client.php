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
        $nbResaclient = $this->nbResaclient() ; // création de cette variable pour pouvoir l'insérer dans le echo ligne 89. 
        
        echo " <br><br><span style='font-size:22px; color:black'> Réservations du client  $this->prenom $this->nom </span><br>"  . " <br> " ;


        if (0==count($this->reservations)) 
        {
            echo "Aucune reservation ";
        } else 
        {
            echo "<span style='text-align:justify; margin: 0'><p style='color:#FFF; font-size:15px; background-color:#36bf94; width: 130px; margin: 5px 0 5px 0; padding:5px'> $nbResaclient RESERVATION(S)</p></span>" . " <br>";
        }
        foreach ($this->reservations as $reservation) 
        {
            $hasWifi = ($reservation->getChambre()->getWifi() ) ? "oui" : "non"; // Ecriture ternaire, soit raccourcis pour if et else lorsque les instructions sont courtes.

        echo $reservation->getChambre()->getHotel() ." / " .$reservation->getChambre(). " / (".$reservation->getChambre()->getnbLits()." - " .$reservation->getChambre()->getPrix()."€ - Wifi : ".$hasWifi. ")  ".$reservation ."<br>";
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
