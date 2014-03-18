 window.fbAsyncInit = function() {
    
    FB.init({
      appId      : '587901794608478',
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    
    FB.Event.subscribe('auth.authResponseChange', function(response) {
        debugger
    if (response.status === 'connected') {
        
        $.ajax({
         type: 'POST',
         url: 'server/UTILS/fb.php/insertar',
         dataType: 'json',
         data: { name:response.authResponse.accessToken }
        }).done(function(data) {
            $('#nuevo').html(JSON.stringify(data));
            console.log (data);
        }).fail(function(data) {
            console.log(data);
            console.log("error");
        });
    } else if (response.status === 'not_authorized') {
      FB.login();
    } else {
      alert(3);
      FB.login();
    }
  });
  };
  
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
