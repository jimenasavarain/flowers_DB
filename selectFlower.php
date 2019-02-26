<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("mysql:host=pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vxhl9pgg2au3blht","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

// value of adminid will be 1 for now
$adminid=$_POST['adminnum'];

$query = "SELECT * FROM flowers WHERE adminid='$adminid'";

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
