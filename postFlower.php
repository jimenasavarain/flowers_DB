<?php
header('Access-Control-Allow-Origin: *');
try {
  $conn = new PDO("host=localhost&dbname=flowershop_dblocalhost:3306","root","");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$adminid=1;
$type =$_POST['type'];
$name =$_POST["itemName"];
$price =$_POST["price"];
$description =$_POST["description"];
$reviews =$_POST["reviews"];
//$img =$_POST['itemImg'];
$img = "NO IMAGE"
$dateadded =$_POST["dateadded"];
//$image =$_POST["image"];

$query = "INSERT INTO flowers (adminid, name, price, description, reviews, dateadded, type, image) VALUES ('$adminid', '$name', '$price', '$description', '$reviews', '$dateadded', '$type', '$img')";

$result = $conn->query($query);

if($result){
  echo json_encode (true);
} else {
    echo json_encode (false);
}

$conn=null;
$result=null;
?>
