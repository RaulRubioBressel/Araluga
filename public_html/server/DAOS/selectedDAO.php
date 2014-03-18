<?php
	require_once("../UTILS/conection.php");
	require_once("../CLASSES/selected.php");
	
	//INSERTAR UN TEMA
	function insert_new_selected($fkTheme, $sel_routeOne, $sel_routeTwo,$sel_routeThree, $sel_textArabic, $sel_textSpanish, $sel_answer, $sel_description){
            
		$conn = get_conection(); //Conection
	
		$query = "INSERT INTO selected (fkTheme, sel_routeOne, sel_routeTwo,sel_routeThree, sel_textArabic, sel_textSpanish, sel_answer, sel_description) 
			VALUES ($fkTheme, '$sel_routeOne', '$sel_routeTwo', '$sel_routeThree', '$sel_textArabic', '$sel_textSpanish', '$sel_answer', '$sel_description');";
			
		$insert = mysqli_query($conn, $query);
	
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	//MODIFICAR CONTENIDO DEL TEMA
	function mod_selected($sel_id, $sel_textArabic, $sel_textSpanish, $sel_answer){
			
		$conn = get_conection(); //Conexion
			
		$query = "UPDATE selected SET sel_textArabic = '$sel_textArabic', sel_textSpanish = '$sel_textSpanish',sel_answer = '$sel_answer' WHERE sel_id = '$sel_id';";
		
		$update = mysqli_query($conn, $query);
		
		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	//BORRAR UN TEMA
	function del_selected($sel_id){
		
		$conn = get_conection(); //Conexion
		
		$query = "DELETE FROM selected WHERE sel_id = '$sel_id';";
		
		$delete = mysqli_query($conn, $query);
		
		if(!$delete){
			return false;
		}else{
			return true;
		}
	
	};
	
	//FUNCION PARA PASAR LOS DATOS DE LA TABLA SELECTED A UN ARCHIVO JSON QUE SERA UTILIZADO PARA PINTAR LA TABLA DE ADMINISTRACION DE LOS SELECTED.
	function admin_selected($theme_id){
				
		$selectedArray = array();
		
		$conn = get_conection(); //Conexion
		
		$query = "SELECT * FROM selected WHERE fkTheme = $theme_id";
		
		$show = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($show)){
			
			$selected = new selected();//CREO OBJETO PARA CADA FILA
			$selected -> setSel_id($row['sel_id']);
			$selected -> setSel_fkTheme($row['fkTheme']);
			$selected -> setSel_routeOne($row['sel_routeOne']);
			$selected -> setSel_routeTwo($row['sel_routeTwo']);
			$selected -> setSel_routeThree($row['sel_routeThree']);
			$selected -> setSel_textArabic($row['sel_textArabic']);	
			$selected -> setSel_textSpanish($row['sel_textSpanish']);
			$selected -> setSel_answer($row['sel_answer']);	
			$selected -> setSel_description($row['sel_description']);	
			
			$selectedArray [] = $selected;//INTRODUZCO EL OBJETO CON LOS DATOS
		}		
		return $selectedArray;
	};
	
?>