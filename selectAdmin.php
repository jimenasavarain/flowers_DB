<?php
header('Access-Control-Allow-Origin: *');
try {
  $conn = new PDO("pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT email, password FROM admins WHERE email='$email' and password='$password'";

//"SELECT * FROM users WHERE username='$username' AND password = '$password';

//USE THIS TO TEST IF INFO IS GOING INTO DATABASE:
//$query = "INSERT INTO users (email, password, username, status) VALUES ('test', 'test', 'test', 1)";

$result = $conn->query($query);
if($result){
  $admins=$result->fetchAll();
  echo json_encode($admins);

} else {
  echo json_encode(false);
}
$conn=null;
$result=null;
?>
