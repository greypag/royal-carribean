<?php
$sendto = "Scarlett@ophubsolutions.com, enquiry@royalcaribben.com.hk"; //"leeyuming@gmail.com";

$firstName = $_POST['firstName'] ;
$lastName = $_POST['lastName'] ;
$address1 = $_POST['address1'] ;
$address2 = $_POST['address2'] ;
$city = $_POST['city'] ;
$country = $_POST['country'] ;
$homePhone = $_POST['homephone'] ;
$email = $_POST['email'] ;
$contactEmail = $_POST['contactEmail'] ;
$futuredestination = $_POST['futuredestinationvalue'] ;
$havereserved = $_POST['havereserved'] ;
$cruiseexperience = $_POST['cruiseexperience'] ;
$crownanchorsociety = $_POST['crownanchorsociety'] ;
$nextcruisevacation = $_POST['nextcruisevacationvalue'] ;
$abletotravel = $_POST['abletotravel'] ;
$activitiesaremostimportant = $_POST['activitiesaremostimportantvalue'] ;
$languageprefer = $_POST['languageprefer'] ;
	
if ( mail($sendto, "Order Brochure", "
	First Name: $firstName\r
	Last Name: $lastName\r
	Address 1: $address1\r
	Address 2: $address2\r
	City: $city\r
	Country: $country\r	
	Home Phone: $homePhone\r
	Email: $email\r
	Contact Email: $contactEmail\r\r
	++++++Optional++++++\r\r
	Future Destination: $futuredestination\r
	Have Reserved: $havereserved\r
	Cruise Experience: $cruiseexperience\r
	Crown & Anchor Society: $crownanchorsociety\r
	Next Cruise Vacation: $nextcruisevacation\r
	Able to Travel: $abletotravel\r
	Activities are Most Important: $activitiesaremostimportant\r
	Language Prefer: $languageprefer\r
	", "From: orderbrochure@royalcaribben.com.hk" ) ) {	
	echo "Successfully";
} else {
	echo "Failed, please try again later."; 
}		
?>