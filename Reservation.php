<?php 

Class Reservation 
    {
        private Client $Client;
        private $dateEntree;
        private $dateSortie;

        private Chambre $chambre;


public function __construct ($client, $chambre, $dateEntree,$dateSortie)
    {
        $this -> dateEntree = new Datetime($dateEntree); 
        $this -> dateSortie= new Datetime($dateSortie); 
        $this -> Client = $client;
        $this -> chambre = $chambre;
        
        $this->Client->addResa($this);
        $this->chambre->addReservation($this);
        $this -> chambre->setStatut(false);
        $this->chambre->getHotel()->addReservations($this);

    }

    public function getdateEntree ()
    {
        
    return $this-> dateEntree;
    
    }

    public function setdateEntree ($dateEntree)

    {
    return $this -> dateEntree = $dateEntree;

    }
    public function getClient()
    {
        return $this -> Client;
    }
    public function getdateSortie ()
    {
        
    return $this-> dateSortie;
    
    }

public function setdateSortie ($dateSortie)

    {
    return $this -> dateSortie = $dateSortie;

    }
    public function getChambre ()
    {
        
    return $this-> chambre;
    
    }

public function setChambre ($chambre)

    {
    return $this -> chambre = $chambre;

    }

//FUNCTIONS********************************


public function __toString()
{
    return "du ".$this->dateEntree->format('d-m-Y')." au ".$this->dateSortie->format('d-m-Y');
}

}