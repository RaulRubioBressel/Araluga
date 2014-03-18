<?php

	require_once("../DAOS/writingDAO.php");
	
	function insert_manager_writing($fkTheme, $write_textArabic, $write_textSpanish, $write_answer, $write_description){
			
			$insert = insert_new_writing($fkTheme, $write_textArabic, $write_textSpanish, $write_answer, $write_description);
			
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	function mod_manager_writing( $write_id, $write_textArabic, $write_textSpanish, $write_answer){

		$update = mod_writing($write_id, $write_textArabic, $write_textSpanish, $write_answer);

		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	function del_manager_writing($write_id){

		$delete = del_writing($write_id);

		if(!$delete){
			return false;
		}else{
			return true;
		}
		
	};
	
	function admin_manager_writing($theme_id){
            
		if(admin_writing($theme_id) != null){
                    return admin_writing($theme_id);
                }else{
                    return false;
                }
		
	};
	
?>