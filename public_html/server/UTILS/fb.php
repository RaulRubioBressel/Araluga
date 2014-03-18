<?php
require '../../vendor/autoload.php';
require("../LIBS/toro.php");
require_once ('vts_lab/src/facebook.php');
require_once ('conection.php');


Guzzle\Http\StaticClient::mount();

session_start();
 
class Test4Handler {
    function post() {
        
        $conn = get_conection();
        
        $token = $_POST['name'];
        $response = Guzzle::get('https://graph.facebook.com/me?access_token='.$token);
        
        $misdatos = $response->json();
        $usuario = $misdatos['username'];
        $email = $misdatos['email'];
        
        $query = "SELECT user_nick FROM users WHERE user_email='$email'";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die ("error" . mysqli_error($conn));
        }

        /*
        if(!mysqli_num_rows($result)){
            return false;
        }else{   
            while($row = mysqli_fetch_array($exist)){
                $user = array(
                    "user_id" => $row['user_id'],
                    "user_email" => $row['user_email'],
                    "user_nick" => $row['user_nick'],
                    "user_role" => empty($row['user_role'])? "normal" : $row['user_role'],
                    "user_diamonds" => $row['user_diamonds']
                );
            }
            $_SESSION['user'] = $user;
            return true;
        }
        
            if (mysqli_num_rows($result) === 0) {
                $query = "INSERT INTO user (user_email, user_nick) 
                VALUES ('$email','$usuario')";
                $res=mysqli_query($enlace,$query);

                if($res){
                    echo "echo ";
                }else{
                    echo "no echo ";
                }
            }else{
                   $_SESSION['usuario']=$usuario;
                   $_SESSION['email']=$email;
            }*/
           
    }
}

Test4Handler::post('CAAIWsY2hZAV4BALKntFCmbBu0GrEWVdzj8ZCRQ7GNYLMmwf63mc81zFzJZBynvMXfjZBqQDSej61BqCyl1vTcbwv3YDetVKamvvMQkWnavcI1JPYdssOG4aaTtbCocODU4qKfZCQaPJzhTD2EN35KcekYbmsCPVT0NLw6ZBksjZCtW4UsNWBSoJwaLXzqvPyPHDZBRwAdmh1cQZDZD');


ToroHook::add("404",  function() {
  header('HTTP/1.0 404 Not Found');
  echo "Error";
});

Toro::serve(array(
     "/insertar" => "Test4Handler"
));

?>

