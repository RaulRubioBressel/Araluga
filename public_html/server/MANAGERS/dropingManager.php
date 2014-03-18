<?php

	require_once("../DAOS/dropingDAO.php");
	
	function insert_manager_droping($fkTheme, $drop_textsArabic, $drop_textsSpanish, $drop_correctAnswer,$drop_description){
			
			$insert = insert_new_droping($fkTheme, $drop_textsArabic, $drop_textsSpanish, $drop_correctAnswer,$drop_description);
			
		if(!$insert){
			return false;
		}else{
			return true;
		}
		
	};
	
	function mod_manager_droping( $drop_id, $drop_textsArabic, $drop_textsSpanish, $drop_correctAnswer){

		$update = mod_droping($drop_id, $drop_textsArabic, $drop_textsSpanish, $drop_correctAnswer);

		if(!$update){
			return false;
		}else{
			return true;
		}
		
	};
	
	function del_manager_droping($drop_id){

		$delete = del_droping($drop_id);

		if(!$delete){
			return false;
		}else{
			return true;
		}
		
	};
	
	function admin_manager_droping($theme_id){
		$exist = admin_droping($theme_id);
		
        if(!$exist){
            return false;
        }else{
            return $exist;
        }

	};

?>