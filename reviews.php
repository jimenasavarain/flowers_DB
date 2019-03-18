<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("mysql:host=pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vxhl9pgg2au3blht","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$flowerid =$_POST["flowerid"];
$reviews =$_POST["review"];

$query = "UPDATE flowers SET reviews = '$reviews' WHERE flower_id='$flowerid'";


$result = $conn->query($query);

if($result){
  echo json_encode(true); 
  
} else {
  echo json_encode(false);
}
$conn=null;
$result=null;
?>