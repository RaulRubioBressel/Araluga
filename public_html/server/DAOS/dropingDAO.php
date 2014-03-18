<?php
	require_once("../UTILS/conection.php");
	require_once("../CLASSES/droping.php");
	
	//INSERTAR UN TEMA
	function insert_new_droping( $fkTheme, $drop_textArabic, $drop_textSpanish, $drop_correctAnswer ,$drop_description){
		$conn = get_conection(); //Conection
	
		$query = "INSERT INTO droping (fkTheme, drop_textArabic, drop_textSpanish, drop_correctAnswer, drop_description) 
			VALUES ($fkTheme,'$drop_textArabic','$drop_textSpanish','$drop_correctAnswer','$drop_description');";
			
		$insert = mysqli_query($conn, $query);
	
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	//MODIFICAR CONTENIDO DEL TEMA
	function mod_droping($drop_id, $drop_textArabic, $drop_textSpanish, $drop_correctAnswer){
			
		$conn = get_conection(); //Conexion
			
		$query = "UPDATE droping SET drop_textArabic = '$drop_textArabic', drop_textSpanish = '$drop_textSpanish',drop_correctAnswer = '$drop_correctAnswer' WHERE drop_id = '$drop_id';";
		
		$update = mysqli_query($conn, $query);
		
		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	//BORRAR UN TEMA
	function del_droping($drop_id){
		
		$conn = get_conection(); //Conexion
		
		$query = "DELETE FROM droping WHERE drop_id = '$drop_id';";
		
		$delete = mysqli_query($conn, $query);
		
		if(!$delete){
			return false;
		}else{
			return true;
		}
	
	};
	
	//FUNCION PARA PASAR LOS DATOS DE LA TABLA droping A UN ARCHIVO JSON QUE SERA UTILIZADO PARA PINTAR LA TABLA DE ADMINISTRACION DE LOS droping.
	function admin_droping($theme_id){
				
		$dropingArray = array();
		
		$conn = get_conection(); //Conexion

		$query = "SELECT * FROM droping WHERE fkTheme = $theme_id";
		$show = mysqli_query($conn, $query);
                
        if(!$show){
            die ("error" . mysqli_error($conn));
        }         
		if(!mysqli_num_rows($show)){
            return false;
        }else{   
            while($row = mysqli_fetch_array($show)){
	
				$droping = new droping();//CREO OBJETO PARA CADA FILA
				$droping -> setDrop_id($row['drop_id']);
				$droping -> setDrop_fkTheme($row['fkTheme']);
				$droping -> setDrop_textsArabic($row['drop_textsArabic']);	
				$droping -> setDrop_textsSpanish($row['drop_textsSpanish']);
				$droping -> setDrop_CorrectAnswer($row['drop_correctAnswer']);	
				$droping -> setDrop_description($row['drop_description']);
				
				$dropingArray [] = $droping;//INTRODUZCO EL OBJETO CON LOS DATOS
			}
            return $dropingArray;
        }
	};

?>