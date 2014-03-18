<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/add_drop" => "add_droping",
    "/del_drop" => "del_droping",
    "/mod_drop" => "mod_droping",
    "/admin_drop" => "admin_droping"
));
?>

