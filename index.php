<h1> POO Hotel</h1>


</h1><?php 

spl_autoload_register(function ($class_name) 
{
    require_once $class_name . '.php';
});
// HOTEL HILTON
$Hilton = new Hotel ( "Hilton ****  "," 10 Route de la Gare", "67000", "Strasbourg" );
$C1Hilton=new Chambre($Hilton, "Chambre 1", "2 lits", 70,true, false);
$C2Hilton=new Chambre($Hilton, "Chambre 2", "2 lits", 70,true, false);
$C3Hilton=new Chambre($Hilton, "Chambre 3", "2 lits", 90,false, true);
$C4Hilton=new Chambre($Hilton, "Chambre 4", "2 lits", 90,false,true);
$C5Hilton=new Chambre($Hilton, "Chambre 5", "2 lits", 90,false,true);
$C6Hilton=new Chambre($Hilton, "Chambre 6", "3 lits", 150,true,true);
$C7Hilton=new Chambre($Hilton, "Chambre 7", "4 lits", 150,false,true);
$C8Hilton=new Chambre($Hilton, "Chambre 8", "4 lits", 220,true,true);
$C9Hilton=new Chambre($Hilton, "Chambre 9", "3 lits", 220,false,true);
$C10Hilton=new Chambre($Hilton, "Chambre 10", "3 lits", 220,true,true);




//HOTE REGENT
$Regent = new Hotel ("Regent *****","23A Rue Jean-Frédéric Oberlin", "775000", "Paris");
$RegentC1=new Chambre($Regent, "Chambre 1", "2 lits", 150,true, true);
$RegentC2=new Chambre($Regent, "Chambre 2", "2 lits", 150,false, true);
$RegentC3=new Chambre($Regent, "Chambre 3", "2 lits", 175,true, true);
$RegentC4=new Chambre($Regent, "Chambre 4", "2 lits", 175,true, true);
$RegentC5=new Chambre($Regent, "Chambre 5", "2 lits", 175,true, true);
$RegentC6=new Chambre($Regent, "Chambre 6", "3 lits", 250,true, true);
$RegentC7=new Chambre($Regent, "Chambre 7", "3 lits", 250,true, true);
$RegentC8=new Chambre($Regent, "Chambre 8", "3 lits", 310,false, true);
$RegentC9=new Chambre($Regent, "Chambre 9", "3 lits", 330,false, true);
$RegentC10=new Chambre($Regent, "Chambre 10", "3 lits", 400 ,true, true);

//Clients

$JohnDoe= new Client ("DOE", "John");
$Jeanne= new Client ("DARC", "Jeanne");
$camille= new Client ("HON", "Camille");
$green = new Client ("GREEN", "Shiloh");

$ResaHilton1 = new Reservation($camille,$C8Hilton,"30-04-2023", "02-05-2023");
$ResaHilton2 = new Reservation($green,$C9Hilton,"30-05-2023", "03-06-2023");
$ResaRegent1 = new Reservation($Jeanne,$RegentC7,"10-06-2023", "13-06-2023");
$ResaRegent1 = new Reservation($camille,$RegentC7,"30-06-2023", "03-07-2023");

// Tests affichages 


echo"<br>";
$Hilton -> afficherInfohotel();  // Affiche Nom, adresse, cp, N chambres de l'hotel, réservées; disponibles 
echo"<br>";
echo"<br>";
$camille -> infoResaclient(); // Affiche Réservations du client
echo " <br> <br>";

$Regent -> infoResaHotel (); // Affiche réservation de l'hotel 
echo "<br>";
$Hilton -> infoResaHotel (); // Affiche réservation de l'hotel 
echo "<br>";

$Hilton -> infoTableauhotel();