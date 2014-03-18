<?php
        require_once("../UTILS/createJson.php");
	require_once("../LIBS/toro.php");
	require_once("../MANAGERS/userManager.php");
	require_once("../ROUTERS/toroUser.php");
        

	class add_user {

		function post() {
			$result = insert_manager_user($_POST['user_nick'], $_POST['user_email'], $_POST['user_password']);
         
	        if($result){
	            echo  $return = createJson("200","Has sido registrado","true");
	        }else{
	            echo  $return = createJson("400","Error al registrarse","false");
	        }		
		}
	}

	class mod_user_pass {

		function post() {
			$result = mod_manager_user($_POST['user_email'], $_POST['user_password']);
			echo $result;
		}

	}

	class mod_user_diamonds {

        function post() {
            $result = mod_manager_themeUser($_POST['user_nick']);

            if ($result) {
                echo $return = createJson("200", "Diamonds user upgrade", $result);
            } else {
                echo $return = createJson("400", "Diamonds user fail", "false");
            }
        }

    }

	class admin_user {

		function post() {
			$result = json_encode(admin_manager_user());
			echo $result;
		}
                
	}
	
	
	class log_in {

		function post() {
		    $result = login_manager_user($_POST['user_nick'], $_POST['user_password']);
                    if($result){
                        echo  $return = createJson("200","Has iniciado sesion",$result);
                    }else{
                        echo $return = createJson("400","Usuario o Contraseña Invalidos","false");
                    } 
		}
        }

        class log_out {

		function post() {
		    $result = logout_manager_user();
                    if($result){
                        echo  $return = createJson("200","Se ha cerrado session","true");
                    }else{
                        echo $return = createJson("400","No hay ninguna sesion iniciada","false");
                    }
                    
		}
	}

	class me {
		function post() {
		    $result = manager_me();
                    if($result){
                    	$user=$_SESSION['user'];
                        echo  $return = createJson("200","Sesion activa",$user);
                    }else{
                        echo $return = createJson("400","No hay ninguna sesion iniciada","false");
                    }
                    
		}

	}
	
?>
