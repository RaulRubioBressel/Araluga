<?php

	require_once("../DAOS/themesDAO.php");
	
	function insert_manager_themes($theme_name, $theme_description, $theme_coorX, $theme_coorY,$vertex_coorX, $vertex_coorY){
		$theme_description=htmlentities($theme_description);
			
            $insert = insert_new_theme($theme_name, $theme_description, $theme_coorX, $theme_coorY,$vertex_coorX, $vertex_coorY);
			
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	function mod_manager_themes($theme_id, $theme_name, $theme_description, $theme_coorX, $theme_coorY){

		$update = mod_theme($theme_id, $theme_description, $theme_name, $theme_coorX, $theme_coorY);

		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	function del_manager_themes($theme_name){

		$delete = del_theme($theme_name);

		if(!$delete){
			return false;
		}else{
			return true;
		}
		
	};
	
	function admin_manager_themes(){
            
           return admin_theme();

	};
?>