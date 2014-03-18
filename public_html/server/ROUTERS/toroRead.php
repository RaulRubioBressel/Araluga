<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/add_reading" => "add_reading",
    "/del_reading" => "del_reading",
    "/mod_reading" => "mod_reading",
    "/admin_reading" => "admin_reading"
));
?>

