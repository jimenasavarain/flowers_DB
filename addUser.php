<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$email =$_POST["email"];
$password =$_POST["password"];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$name= $firstname . " " . $lastname;

$query = "SELECT * FROM users WHERE email='$email'";

$result = $conn->query($query);
if($result){
  $users=$result->fetchAll();

  if (!empty($users)){
    echo json_encode(false);
  } else {

    $query = "INSERT INTO users (name, password, email) VALUES ('$name' '$password', '$email')";


    $result = $conn->query($query);
    if($result){
      $user_id=$conn->lastInsertId();
      echo json_encode(array(
        'status'=>true,
        'id'=>$user_id,
      ));

    } else {
      echo json_encode(false);
    }
  }


} else {
  echo json_encode(false);
}

$conn=null;
$result=null;
?>
