<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/add_theme" => "add_theme",
    "/del_theme" => "del_theme",
    "/mod_theme" => "mod_theme",
    "/admin_app" => "admin_app",
 
));
?>

