<?php
require_once ('../src/facebook.php');
$facebook = new Facebook();
$status = $facebook-> api("/me/albums","POST",array(
"name"=>"Araluga",
"message"=>"Aprende idiomas facil e intretenido",
    "privacy"=>"{'value':'EVERYONE'}"
));

echo $status["name"];
?>