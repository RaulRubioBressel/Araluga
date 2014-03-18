<?php
require_once("../UTILS/createJson.php");
require_once("../LIBS/toro.php");
require_once("../MANAGERS/writingManager.php");
require_once("../ROUTERS/toroWrite.php");

class add_writing {

    function post() {
        
		$result = insert_manager_writing($_POST['fkTheme'],$_POST['write_textArabic'], $_POST['write_textSpanish'], $_POST['write_answer'], $_POST['write_description']);
		
        echo $result;
    }

}

class mod_writing {

    function post() {
        $result = mod_manager_writing($_POST['write_id'], $_POST['write_textArabic'], $_POST['write_textSpanish'], $_POST['write_answer']);
    }

}

class del_writing {

    function post() {
        $result = del_manager_writing($_POST['write_id']);
    }

}

class admin_writing {

    function post() {
        $result = admin_manager_writing($_POST['theme_id']);
        
      	if($result){
            echo  $return = createJson("200","Write Exercise Loaded",$result);
        }else{
            echo  $return = createJson("400","Write Exercise Error","false");
        }
    }

}
?>

