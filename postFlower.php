<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("","","");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$adminid=$_POST["adminid"];
$name =$_POST["name"];
$price =$_POST["price"];
$description =$_POST["description"];
$reviews =$_POST["reviews"];
$dateadded =$_POST["dateadded"];
//$image =$_POST["image"];

$query = "INSERT INTO flowers (adminid, name, price, description, reviews, dateadded) VALUES ('$adminid', '$name', '$price', '$description', '$reviews', '$dateadded')";

$result = $conn->query($query);

$conn=null;
$result=null;
?>
