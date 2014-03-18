<?php
require_once("../UTILS/createJson.php");
require_once("../LIBS/toro.php");
require_once("../MANAGERS/selectedManager.php");
require_once("../ROUTERS/toroSelect.php");

class add_selected {

    function post() {
		$result = insert_manager_selected($_POST['fkTheme'], $_POST['sel_routeOne'], $_POST['sel_routeTwo'], $_POST['sel_routeThree'], $_POST['sel_textArabic'], $_POST['sel_textSpanish'], $_POST['sel_answer'], $_POST['sel_description']);
		
        echo $result;
    }

}

class mod_selected {

    function post() {
        $result = mod_manager_selected($_POST['selselected_id'], $_POST['sel_textArabic'], $_POST['sel_textSpanish'], $_POST['sel_answer']);
    }

}

class del_selected {

    function post() {
        $result = del_manager_selected($_POST['sel_id']);
    }

}

class admin_selected {

    function post() {
        $result = admin_manager_selected($_POST['theme_id']);
        
      	if($result){
            echo  $return = createJson("200","Select Exercise Loaded",$result);
        }else{
            echo  $return = createJson("400","Select Exercise Error","false");
        }
    }

}

?>

