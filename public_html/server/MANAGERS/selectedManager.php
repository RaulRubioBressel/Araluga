<?php

	require_once("../DAOS/selectedDAO.php");
	
	function insert_manager_selected($fkTheme, $sel_routeOne, $sel_routeTwo,$sel_routeThree, $sel_textArabic, $sel_textSpanish, $sel_answer){
			
			$insert = insert_new_selected( $fkTheme, $sel_routeOne, $sel_routeTwo,$sel_routeThree, $sel_textArabic, $sel_textSpanish, $sel_answer);
			
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	function mod_manager_selected($sel_id, $sel_textArabic, $sel_textSpanish, $sel_answer){

		$update = mod_selected($sel_id, $sel_textArabic, $sel_textSpanish, $sel_answer);

		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	function del_manager_selected($sel_id){

		$delete = del_selected($sel_id);

		if(!$delete){
			return false;
		}else{
			return true;
		}
		
	};
	
	function admin_manager_selected($theme_id){
            
                if(admin_selected($theme_id) != null){
                    return admin_selected($theme_id);
                }else{
                    return false;
                }
		
	};
	
?>