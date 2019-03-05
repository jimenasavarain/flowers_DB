<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("mysql:host=pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vxhl9pgg2au3blht","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$flowerid=$_POST['flowerid'];
$type =$_POST['type'];
$name =$_POST["itemName"];
$price =$_POST["price"];
$description =$_POST["description"];
$reviews ="test";
$img = "NO IMAGE";
$dateadded =$_POST["dateadded"];

//$query = "SELECT * FROM flowers WHERE adminid='$adminid'";

$query = "UPDATE flowers SET email = '$uEmail' WHERE flower_id = '$flowerid'";

$result = $conn->query($query);

if($result){
  $flowers = $result->fetchAll(PDO::FETCH_CLASS);
  echo json_encode ($flowers);
} else {
    echo json_encode (false);
}

$conn=null;
$result=null;
?>
