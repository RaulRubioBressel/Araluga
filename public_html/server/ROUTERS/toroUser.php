<?php
ToroHook::add("404", function() {
    header('HTTP/1.0 404 Not Found');
    echo "Error";
});

Toro::serve(array(
    "/signup" => "add_user",
    "/login" => "log_in",
    "/logout" => "log_out",
    "/passRecovery" => "mod_user_pass",
    "/admin_user" => "admin_user",
    "/me" => "me",
   	"/diamondRecovery" => "mod_user_diamonds"     
));
?>

