<?php
        session_start();
        
		require_once("../UTILS/conection.php");
		require_once("../CLASSES/user.php");
	
	//REGISTRO
	function insert_new_user($user_nick, $user_email, $user_password){
	
		$conn = get_conection(); //Conexion
		
		$query = "INSERT INTO users (user_nick, user_email, user_password) 
			VALUES ('$user_nick','$user_email','$user_password');"; 
		
		$insert = mysqli_query($conn, $query);
		
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
        
        //LOGIN
	function login_user($user_nick, $user_password){
	
		$conn = get_conection(); //Conexion
		
		$query = "SELECT * FROM users WHERE user_nick = '$user_nick' AND user_password = '$user_password';"; 
		$exist = mysqli_query($conn, $query);
                
                if(!$exist){
                    die ("error" . mysqli_error($conn));
                }         
		if(!mysqli_num_rows($exist)){
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
	};

        //var_dump(login_user('pepet676', 'pepe'));
        
        // LOGOUT
    function logout_user(){
		if(!$_SESSION){
			return false;
		}else{
            $_SESSION = null;
            session_destroy();
			return true;
		}
		
	};
	
	//MODIFICAR CONTRASEÑA DEL USUARIO
	function mod_user_password($user_nick, $user_password){
		
		$conn = get_conection(); //Conexion
		
		$query = "UPDATE users SET user_password = '$user_password' WHERE user_nick = '$user_nick';";
		echo $query;
		$update = mysqli_query($conn, $query);
		
		if(!$update){
			return false;
		}else{
			return true;
		}

	
	};

	//MODIFICAR EL TEMA EN EL QUE ESTA EL USUARIO DEL USUARIO.
	function mod_user_theme($user_nick) {

        $conn = get_conection(); //Conexion

        $select = "SELECT user_diamonds FROM users WHERE user_nick = '$user_nick'";

        $exist = mysqli_query($conn, $select);

        if (!$exist) {
            die("error" . mysqli_error($conn));
        }
        if (!mysqli_num_rows($exist)) {
            return false;
        } else {

            $user_diamonds = mysqli_fetch_array($exist);

            $user_diamonds['user_diamonds'] += 1;

            $query = "UPDATE users SET user_diamonds = '" . $user_diamonds['user_diamonds'] . "' WHERE user_nick = '$user_nick';";

            $update = mysqli_query($conn, $query);

            if (!$update) {
                return false;
            } else {
                $_SESSION['user']['user_diamonds'] = $user_diamonds['user_diamonds'];
                return true;
            }
        }
    };
	
	//BORRAR UN USUARIO
	function del_user($user_id){
		
		$conn = get_conection(); //Conexion
		
		$query = "DELETE FROM users WHERE user_id = '$user_id';";
		
		$delete = mysqli_query($conn, $query);
		
		if(!$delete){
			return false;
		}else{
			return true;
		}
	
	};
	
	//FUNCION PARA PASAR LOS DATOS DE LA TABLA THEMES A UN ARCHIVO JSON QUE SERA UTILIZADO PARA PINTAR LA TABLA DE ADMINISTRACION DE LOS THEMES.
	function admin_users(){
				
		$usersArray = array();
		
		$conn = get_conection(); //Conexion
		
		$query = "SELECT user_id, user_nick, user_role, user_email, user_diamonds FROM users;";
		
		$show = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($show)){
			
			$users = new user();//CREO OBJETO PARA CADA FILA
			
			$users -> setUser_id($row['user_id']);
			$users -> setUser_nick($row['user_nick']);
			$users -> setUser_role($row['user_role']);
			$users -> setUser_email($row['user_email']);
			$users -> setUser_diamonds($row['user_diamonds']);
						
			$usersArray [] = $users;//INTRODUZCO EL OBJETO CON LOS DATOS
		}
				
		return $usersArray;
	};
	function me(){
		 if(empty($_SESSION['user'])){
            return false;
        }else{
        	return true;
        }
	}
	
?>