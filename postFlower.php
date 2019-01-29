<?php
header('Access-Control-Allow-Origin: *');
try {
  $conn = new PDO("localhost:3306","root","root");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$adminid=1;
$type =$_POST['type'];
$name =$_POST["itemName"];
$price =$_POST["price"];
$description =$_POST["description"];
$reviews =$_POST["reviews"];
$img =$_POST['itemImg'];
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
