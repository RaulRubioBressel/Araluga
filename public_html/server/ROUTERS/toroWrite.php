<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/add_write" => "add_writing",
    "/del_write" => "del_writing",
    "/mod_write" => "mod_writing",
    "/admin_write" => "admin_writing"
));
?>

