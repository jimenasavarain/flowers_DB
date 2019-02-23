<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("mysql:host=pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vxhl9pgg2au3blht","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$adminid=1;
$type =$_POST['type'];
$name =$_POST["itemName"];
$price =$_POST["price"];
$description =$_POST["description"];
$reviews ="NO REVIEWS";
$img = "NO IMAGE";
$dateadded =$_POST["dateadded"];

$query = "INSERT INTO flowers (name, type, price, description, reviews, dateadded, image, adminid) VALUES ('$name', '$type', '$price', '$description', '$reviews', '$dateadded', '$img', '$adminid')";

$result = $conn->query($query);

if($result){
  echo json_encode (true);
} else {
    echo json_encode (false);
}

$conn=null;
$result=null;
?>
