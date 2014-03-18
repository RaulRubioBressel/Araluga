<?php
session_start();
require_once ('src/facebook.php');
require_once ('../../conection.php');
require_once ('../fb.php');
    $enlace = get_conection();
    $facebook = new Facebook();
    $fb_id = $facebook->getUser();
    $datos = $facebook->api("/me");
    $usuario=$u;
    $email=$e;
  //  $pass='1';
    $fecha='2012-03-5';
    
    if($fb_id!=0){//verificar usuario        
        if (mysqli_connect_errno()) {/* comprobar la conexión */
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            
            exit();
        }
        /* Comprobar si el usuario existe en la bbdd */
        $consulta = "SELECT fb_id,email FROM login WHERE fb_id=$fb_id";
        $sentencia = mysqli_query($enlace, $consulta);
        //$num_rows=mysqli_stmt_num_rows($sentencia);
        if ($sentencia->num_rows>0) {
            echo "el usuario existe";
         $datos=$sentencia->fetch_array(MYSQLI_ASSOC);  
         $_SESSION['usuario']=$usuario;
         $_SESSION['email']=$datos['email'];
        }else{
           $query = "INSERT INTO users (user_email, user_nick, user_facebook) 
            VALUES ('$email','$usuario','$fb_id')";
            $res=mysqli_query($enlace,$query);

        if($res){
            echo "echo ";
        }else{
            echo "no echo";
        }
            $_SESSION['usuario']=$usuario;
            $_SESSION['email']=$email;
     }
  }
  
?>
