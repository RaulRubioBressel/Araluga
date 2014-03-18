<?php
	require_once("../UTILS/conection.php");
	require_once("../CLASSES/writing.php");
	
	//INSERTAR UN TEMA
	function insert_new_writing( $fkTheme, $write_textArabic, $write_textSpanish, $write_answer, $write_description){
		$conn = get_conection(); //Conection
		
		$query = "INSERT INTO writing (fkTheme, write_textArabic, write_textSpanish, write_answer, write_description) 
			VALUES ($fkTheme,'$write_textArabic','$write_textSpanish','$write_answer', '$write_description');";
			
		
		$insert = mysqli_query($conn, $query);
	
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	//MODIFICAR CONTENIDO DEL TEMA
	function mod_writing($write_id, $write_textArabic, $write_textSpanish, $write_answer){
			
		$conn = get_conection(); //Conexion
			
		$query = "UPDATE writing SET write_textArabic = '$write_textArabic', write_textSpanish = '$write_textSpanish',write_answer = '$write_answer' WHERE write_id = '$write_id';";
		
		$update = mysqli_query($conn, $query);
		
		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	//BORRAR UN TEMA
	function del_writing($write_id){
		
		$conn = get_conection(); //Conexion
		
		$query = "DELETE FROM writing WHERE write_id = '$write_id';";
		
		$delete = mysqli_query($conn, $query);
		
		if(!$delete){
			return false;
		}else{
			return true;
		}
	
	};
	
	//FUNCION PARA PASAR LOS DATOS DE LA TABLA writing A UN ARCHIVO JSON QUE SERA UTILIZADO PARA PINTAR LA TABLA DE ADMINISTRACION DE LOS writing.
	function admin_writing($theme_id){
				
		$writingArray = array();
		
		$conn = get_conection(); //Conexion
		
		$query = "SELECT * FROM writing WHERE fkTheme = $theme_id";
		
		$show = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($show)){
			
			$writing = new writing();//CREO OBJETO PARA CADA FILA
			$writing -> setWrite_id($row['write_id']);
			$writing -> setWrite_fkTheme($row['fkTheme']);
			$writing -> setWrite_textArabic($row['write_textArabic']);	
			$writing -> setWrite_textSpanish($row['write_textSpanish']);
			$writing -> setWrite_answer($row['write_answer']);
			$writing -> setWrite_description($row['write_description']);	
			
			$writingArray [] = $writing;//INTRODUZCO EL OBJETO CON LOS DATOS
		}		
		return $writingArray;
	};