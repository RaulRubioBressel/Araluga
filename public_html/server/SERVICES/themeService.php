<?php
    require_once("../UTILS/createJson.php");
    require_once("../LIBS/toro.php");
    require_once("../MANAGERS/themesManager.php");
    require_once("../ROUTERS/toroTheme.php");

    class add_theme {

        function post() {
            $result = insert_manager_themes($_POST['theme_name'], $_POST['theme_description'], $_POST['theme_coorX'], $_POST['theme_coorY'], $_POST['vertex_coorX'], $_POST['vertex_coorY']);
            echo $result;
        }

    }

    class mod_theme {

        function post() {
            $result = mod_manager_themes($_POST['theme_id'], $_POST['theme_description'], $_POST['theme_name'], $_POST['theme_coorX'], $_POST['theme_coorY']);
        }

    }

    class del_theme {

        function post() {
            $result = del_manager_themes($_POST['theme_name']);
        }

    }

    class admin_app {
 
        function post() {
            
            $themes = admin_manager_themes();
            if($themes){
                echo $return = createJson("200","Themes Retrieved",$themes);
            }else{
                echo $return = createJson("400","Themes Retrieved Failes","false");
            }

        }

    }
?>

