<?php
require_once("../UTILS/createJson.php");
require_once("../LIBS/toro.php");
require_once("../MANAGERS/dropingManager.php");
require_once("../ROUTERS/toroDrop.php");

class add_droping {

    function post() {
        $result = insert_manager_droping($_POST['fkTheme'],$_POST['drop_textsArabic'], $_POST['drop_textsSpanish'], $_POST['drop_correctAnswer'], $_POST['drop_description']);
		
        echo $result;
    }

}

class mod_droping {

    function post() {
        $result = mod_manager_droping($_POST['drop_id'], $_POST['drop_textsArabic'], $_POST['drop_textsSpanish'], $_POST['drop_correctAnswer']);
    }

}

class del_droping {

    function post() {
        $result = del_manager_droping($_POST['drop_id']);
    }

}

class admin_droping {

    function post() {
        $result = admin_manager_droping($_POST['theme_id']);
      	
        if($result){
            echo  $return = createJson("200","Drop Exercise Loaded",$result);
        }else{
            echo  $return = createJson("400","Drop Exercise Error","false");
        }
    }
}

?>

