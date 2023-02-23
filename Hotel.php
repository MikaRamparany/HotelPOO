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
        $nbChambresresa = count($this->getreservations()); // création de cette variable pour pouvoir l'insérer dans le echo ligne 114.
        
        echo " <br><br><span style='font-size:22px; color:black'> Réservations de l'hôtel  $this->nom</span><br>"  . " <br> " ;

        
      

        if (0 == count($this->reservations)) {
            echo "Aucune reservation ";
        } else
            {
            echo "<span style='text-align:justify; margin: 0'><p style='color:#FFF; font-size:15px; background-color:#00A310; width: 130px; margin: 5px 0 5px 0; padding:5px'> $nbChambresresa RESERVATION(S)</p></span>" . " <br>";
            }

            foreach ($this->reservations as $reservation) { 
              


                 echo $reservation->getClient()->getprenom() . " " . $reservation->getClient()->getnom() . " " . $reservation->getChambre()->getnumero() .$reservation ."<br>" ;
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
        return  $chambresReservees;
    }



    public function afficherInfohotel()

    {

        $nbrChambreDispo = count ($this->getchambres()) - $this->chambresReservees();

        echo "<br>   " . $this->getnom() . "</br>"
            . "Adresse : " . $this->getadresse() . " "
            . $this->getcPostale()  . " "
            . $this->getville() . "<br>"
            . "Nombre de chambres : " . count ($this->getchambres()) // ici "$this->getchambres() (le tableau) n'est pas accepté (message d'erreur). il faut alors une fonction pour pouvoir seulement afficher la taille du tableau et non le tableau en entier, soit : count($this-> getchambres()) OU sizeof()
            . " <br> Nombre de chambres réservées : " . $this->chambresReservees()
            . "</br> Nombre de chambres disponibles : " . $nbrChambreDispo; // ou bien mettre : (count ($this->getchambres()) - $this->chambresReservees())
    }

    public function infoTableauhotel()
    {    
        echo "<span style='font-size:22px ; color:black'>Statut des chambres de <b> $this->nom </b> :</span><br><br>";
        echo "<style type=text/css>",
        '<thead>',
            '<tr>',
                '<th> CHAMBRE </th>', '<th> PRIX </th>', '<th> WIFI</th>', '<th> ETAT</th>',
            '</tr>';
        '<tbody>';
        foreach ($this->chambres as  $chambre)
            {
                
            "<td style=color:'grey'>.$chambre->getnom();</td>";

            }
       
        
    

    }
    public function __toString()
    {
        return $this->nom . $this->ville;
    }
}
