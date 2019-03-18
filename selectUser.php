<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
  $conn = new PDO("mysql:host=pwcspfbyl73eccbn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vxhl9pgg2au3blht","djjgopngh67f0sdi","o2hle778718kdubu");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$email = $_POST["email"];
$password = $_POST["password"];

// $query = "SELECT email, password FROM users WHERE email='$email' and password='$password'";

$query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($query);
        if ($result) {
            //goes into conditional argument
            //$result->num_rows === 1

            $row = $result->fetch();
            $users = $result->fetchAll(PDO::FETCH_CLASS);
            //$row = $result->fetch_array(MYSQLI_ASSOC);
            //$row = $result->fetchAll(PDO::FETCH_CLASS);
            //$row['password']
            if (password_verify($password, $row['password'])) {

                //Password matches, so create the session
                // $_SESSION['user'] = $row['user_id'];
                // header("Location: http://www.example.com/logged_in.php");

                echo json_encode($users);

            }else{
                echo json_encode("The username or password do not match");
            }
          }else{
            echo json_encode(false);
          }

//"SELECT * FROM users WHERE username='$username' AND password = '$password';

//USE THIS TO TEST IF INFO IS GOING INTO DATABASE:
//$query = "INSERT INTO users (email, password, username, status) VALUES ('test', 'test', 'test', 1)";

// $result = $conn->query($query);
// if($result){
//   $users=$result->fetchAll();
//   echo json_encode($users);
//
// } else {
//   echo json_encode(false);
// }
$conn=null;
$result=null;
?>
