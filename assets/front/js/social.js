window.fbAsyncInit = function() {
    FB.init({
      appId      : '189871496142902', // App ID
      status     : false, 
      version:  'v9.0',
      cookie     : true, 
      xfbml      : false  // parse XFBML
    });
};
function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?scope=email',function(response) {
        var email = '';
        if(response.email)
        email = response.email;
    var url = panel_url+"login";
    url = url+"?type=front&social_type=facebook"+"&id="+response.id+"&email="+email+"&email="+email;
    alert(url);
        console.log('Good to see you, ' + response.name + '.' + ' Email: ' + response.email + ' Facebook ID: ' + response.id);
    });
}

  function tlogin() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
            console.log(response.authResponse.accessToken);
            var url = panel_url;
            var url = url+"api/social_login?type=front&access_token="+response.authResponse.accessToken;
            $.ajax({
      type: "POST",
      url: url,
      success: function (result) {
         console.log(result);
         var obj = JSON.parse(result);
         if(obj['rurl'])
         {
         window.location.replace(obj['rurl']);
         }
      }
 });
        } else {
            // cancelled
        }
    }, { scope: 'email' });
    }