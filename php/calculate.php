<?php
//*************************
//AUTHOR: EDGARDO VILLAFANE
//LAST VERSION: 4/5/2018
//PROJECT: Wedding Rings Test
//************************* 

//array with the prices by metal. 
//In real system must be a select from a DB table METALS
$metals = [
    "Palladium" => 150,
    "Gold" => 120,
    "Silver" => 100
];
//array with the coeficient by size. I apply a rate to increase the price by size.
//  In real system must be a select from a DB table SIZE
$sizes = [
    "K" => 1.3,
    "L" => 1.2,
    "M" => 1.1,
    "N" => 1
];

//this operation apply the size coeficient to a base price of a selected metal
$price=number_format(($metals[$_POST["metal"]] * $sizes[$_POST["size"]]),2);
$myRing=new stdClass();
$myRing->price = $price;
$myRing->metal=$_POST["metal"];
$myRing->size=$_POST["size"];
$myJSON = json_encode($myRing, JSON_FORCE_OBJECT);
echo $myJSON;