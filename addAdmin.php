<?php
header('Access-Control-Allow-Origin: *');
try {
  $conn = new PDO("host=localhost&dbname=flowershop_dblocalhost:3306","root","root");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$email =$_POST["email"];
$password =$_POST["password"];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];

$query = "SELECT * FROM admins WHERE email='$email'";

$result = $conn->query($query);
if($result){
  $admins=$result->fetchAll();

  if (!empty($admins)){
    echo json_encode(false);
  } else {

    $query = "INSERT INTO admins (firstname, lastname, password, email) VALUES ('$firstname', '$lastname', '$password', '$email')";


    $result = $conn->query($query);
    if($result){
      $admin_id=$conn->lastInsertId();
      echo json_encode(array(
        'status'=>true,
        'id'=>$admin_id,
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
