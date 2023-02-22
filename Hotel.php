<?php

class Hotel
{

    private string $nom;
    private string $adresse;
    private string $cPostale;
    private string $ville;
    private array $chambres = [];
    private array $reservations = [];

    public function __construct($nom, $adresse, $cPostale, $ville)
    {

        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->cPostale = $cPostale;
        $this->ville = $ville;
        $this->chambres = [];
        $this->reservations = [];
    }

    // GETTERS AND SETTERS

    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)

    {
        return $this->nom = $nom;
    }

    public function getadresse()
    {
        return $this->adresse;
    }

    public function setadresse($adresse)
    {
        return $this->adresse = $adresse;
    }
    public function getville()
    {
        return $this->ville;
    }

    public function setville($ville)
    {
        return $this->ville = $ville;
    }

    public function getChambres()
    {
        return  $this->chambres;
    }

    public function setnbChambres($nbChambres)
    {
        return $this->chambres = $nbChambres;
    }

    public function getcPostale()
    {
        return $this->cPostale;
    }

    public function setcPostale($cPostale)
    {
        return $this->cPostale = $cPostale;
    }

    public function getreservations()
    {
        return $this->reservations;
    }
    public function setreservations($reservations)
    {
        return $this->reservations = $reservations;
    }


    // FONCTIONS : il faudra afficher les infos de l'hôtel, soit adresse, nb de chambres, nb de réservation (ICI à voir pour lier avec une fonction de la classe reservation), nb de chambres disponibles.

    public function addChambres(Chambre $chambre)
    {
        $this->chambres[] = $chambre;
    }




    public function addReservations(Reservation $reservation)
    {
        $this->reservations[] = $reservation;

    }
    public function infoResaHotel()
    {

        
        echo " <br> <br> Réservations de l'hôtel " . $this->getnom() . " <br> " . count($this->getreservations()) . " RESERVATION(S)" . " <br>";

        if (0 == count($this->reservations)) {
            echo "Aucune reservation ";
        } else {
            foreach ($this->reservations as $reservation) { 
              
                echo $reservation->getClient()->getprenom() . " " . $reservation->getClient()->getnom() . " " . $reservation->getChambre()->getnumero() ."<br>";
            }
        }
    }







    public function chambresDisponibles()
    {
        $chambresDisponibles = 0;
        foreach ($this->chambres as  $chambre) {
            if ($chambre->getStatut() == true) {
                $chambresDisponibles++; // OU $chambresDisponibles = $chambresDisponibles + 1
            }
        }
        return "Chambres disponibles : " . $chambresDisponibles;
    }

    public function chambresReservees()
    {
        $chambresReservees = 0;
        foreach ($this->chambres as $chambre) {
            if ($chambre->getStatut() == false) {
                $chambresReservees++;
            }
        }
        return "Chambres réservées : " . $chambresReservees;
    }



    public function afficherInfohotel()

    {
        echo "<br>   " . $this->getnom() . "</br>"
            . "Adresse : " . $this->getadresse() . " "
            . $this->getcPostale()  . " "
            . $this->getville() . "<br>"
            . "Nombre de chambres : " . count($this->getchambres()) // ici "$this->getchambres() (le tableau) n'est pas accepté (message d'erreur). il faut alors une fonction pour pouvoir seulement afficher la taille du tableau et non le tableau en entier, soit : count($this-> getchambres()) OU sizeof()
            . " <br> Nombre de chambres réservées : " . count($this->getreservations())
            . "</br> Nombre de chambres disponibles : ";
    }


    public function __toString()
    {
        return $this->nom . $this->ville;
    }
}
