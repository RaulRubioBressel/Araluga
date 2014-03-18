<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/add_select" => "add_selected",
    "/del_select" => "del_selected",
    "/mod_select" => "mod_selected",
    "/admin_select" => "admin_selected"
));
?>

