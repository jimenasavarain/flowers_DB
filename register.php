<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("","","");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$email =$_POST["email"];
$password =$_POST["password"];
$name =$_POST["name"];

$query = "SELECT * FROM admins WHERE email='$email'";

$result = $conn->query($query);
if($result){
  $admins=$result->fetchAll();
  
  if (!empty($users)){
    echo json_encode(false);  
  } else {
    
    $query = "INSERT INTO admins (name, password, email) VALUES ('$name', '$password', '$email')";


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
