<?php   
        
	require_once("../DAOS/userDAO.php");
	
	function insert_manager_user($user_nick, $user_email, $user_password){
                $conn = get_conection();
            
                $query = "SELECT * FROM users WHERE user_nick = '$user_nick'"; 
		$exist = mysqli_query($conn, $query);
                
                if(!$exist){
                    die ("error" . mysqli_error($conn));
                }         
		if(mysqli_num_rows($exist)){
                    return false;
                }else{
                    $insert = insert_new_user($user_nick, $user_email, $user_password);

                    if(!$insert){
                            return false;
                    }else{
                            return true;
                    }
                }
	};
        
        function login_manager_user($user_nick, $user_password){
            if(!empty($_SESSION['user'])){
                return false;
            }else{
                $exist = login_user($user_nick, $user_password);
                if(!$exist){
                    return false;
                }else{
                    $user = $_SESSION['user'];
                    return $user;
                }
            }
        };
        
        function logout_manager_user(){
            
            $exist = logout_user();
            
            if(!$exist){
                return false;
            }else{
                return true;
            }
            
        };
	
	function mod_manager_user($user_email, $user_password){

		$update = mod_user_password($user_email, $user_password);

		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
    function mod_manager_themeUser($user_nick) {

        $update = mod_user_theme($user_nick);

        if (!$update) {
            return false;
        } else {
            $user = $_SESSION['user'];
            return $user;
        }
    };

	function del_manager_user($user_id){

		$delete = del_user($user_id);

		if(!$delete){
			return false;
		}else{
			return true;
		}
		
	};
	
	function admin_manager_user(){
	
		return admin_users();
		
	};
    function manager_me(){
        $result=me();
        if(!$result){
            return false;
        }else{
            return true;
        }

    }
	
?>