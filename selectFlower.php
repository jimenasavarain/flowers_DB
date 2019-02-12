<?php
header('Access-Control-Allow-Origin: *');
try {
  $conn = new PDO("mysql:host=localhost;dbname=flowershop_db","newroot","newroot");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$adminid=1;

//$query = "INSERT INTO flowers (adminid, name, price, description, reviews, dateadded, type, image) VALUES ('$adminid', '$name', '$price', '$description', '$reviews', '$dateadded', '$type', '$img')";

$query = "SELECT * FROM flowers";

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
