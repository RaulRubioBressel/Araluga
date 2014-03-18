<?php
require_once ('src/facebook.php');
$facebook = new Facebook();
$url = $facebook->getLoginUrl(array(
    'redirect_uri'=>"http://localhost/Araluga/public_html/server/UTILS/vts_lab/fb_callback.php",
    'scope'=>"user_photos, publish_stream"
    ))
        
?>
<a href="<?php echo $url;?>">Login facebook</a>