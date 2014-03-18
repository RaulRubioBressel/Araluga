<?php
	require_once("../UTILS/conection.php");
	require_once("../CLASSES/themes.php");
	require_once("userDAO.php");
	
	//INSERTAR UN TEMA
	function insert_new_theme($theme_name, $theme_description, $theme_coorX, $theme_coorY, $vertex_coorX,$vertex_coorY){
		$conn = get_conection(); //Conection
	
		$query = "INSERT INTO themes (theme_description, theme_name, theme_coorX, theme_coorY,vertex_coorX, vertex_coorY) 
			VALUES ('$theme_description','$theme_name',$theme_coorX,$theme_coorY,$vertex_coorX, $vertex_coorY);";

		$insert = mysqli_query($conn, $query);
	
		if(!$insert){
			return false;
		}else{
			return true;
		}
	};
	
	//MODIFICAR CONTENIDO DEL TEMA
	function mod_theme($theme_id, $theme_name, $theme_description, $theme_coorX, $theme_coorY){
			
		$conn = get_conection(); //Conexion
			
		$query = "UPDATE themes SET theme_name = '$theme_name', theme_description = '$theme_description',theme_coorX = '$theme_coorX', theme_coorY = '$theme_coorY' WHERE theme_id = '$theme_id';";
		
		$update = mysqli_query($conn, $query);
		
		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	//BORRAR UN TEMA
	function del_theme($theme_name){
		
		$conn = get_conection(); //Conexion
		
		$query = "DELETE FROM themes WHERE theme_name = '$theme_name';";
		
		$delete = mysqli_query($conn, $query);
		
		if(!$delete){
			return false;
		}else{
			return true;
		}
	
	};
	
	//FUNCION PARA PASAR LOS DATOS DE LA TABLA THEMES A UN ARCHIVO JSON QUE SERA UTILIZADO PARA PINTAR LA TABLA DE ADMINISTRACION DE LOS THEMES.
	function admin_theme(){
				
		$themesArray = array();
		
		$conn = get_conection(); //Conexion
                
		$user_theme = empty($_SESSION['user'])?0:$_SESSION['user']['user_diamonds'];
                
		$query = "SELECT theme_id, theme_description, theme_name, theme_coorX, theme_coorY, vertex_coorX, vertex_coorY , theme_img FROM themes WHERE theme_id<='$user_theme';";
		
		$show = mysqli_query($conn, $query);

                if(!$show){
                    die ("error" . mysqli_error($conn));
                }
                
                if(!mysqli_num_rows($show)){
                    return false;
                }else{
                    while($row = mysqli_fetch_array($show)){

                            $themes = new themes();//CREO OBJETO PARA CADA FILA

                            $themes -> setTheme_id($row['theme_id']);
                            $themes -> setTheme_description($row['theme_description']);                   
                            $themes -> setTheme_name($row['theme_name']);
                            $themes -> setTheme_coorX($row['theme_coorX']);
                            $themes -> setTheme_coorY($row['theme_coorY']);	
                            $themes -> setVertex_coorX($row['vertex_coorX']);
                            $themes -> setVertex_coorY($row['vertex_coorY']);
                            $themes -> setTheme_img($row['theme_img']);


                            $themesArray [] = $themes;//INTRODUZCO EL OBJETO CON LOS DATOS
                    }		
                    return $themesArray;
                }
                
	};
?>