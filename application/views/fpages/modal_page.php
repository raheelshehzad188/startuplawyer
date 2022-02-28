
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= $title;?>  <?= isset($page)?$page:''; ?></title>
    <link rel="apple-touch-icon" href="<?= $assets?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ;?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!--Form table-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/pages/data-list-view.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/plugins/tour/tour.css">
    
    <!-- START: chat CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>app-assets/css/pages/app-chat.css">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<style>
   .icon{
       margin:18% 20% -100px;

    }
</style>
<body>
    <input type="hidden" id="order_<?= $order_id ?>" value="<?= $action ?>" />
    <div  class="icon text-center modal-body" id="loader" style="display:none;">
        
        Loading ----
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
     var BASE_URL = "<?=(isset($url)?$url:base_url())?>";
     function show_loader(){
            var html = '<img src="<?= site_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin-left: 204px;" />';
                $('.modal-body').html(html);
        }
        function submit_form(id)
        {
            var mid = "#"+id;
            var datastring = $(mid).serialize();
            console.log(datastring);
$.ajax({
    type: $(mid).attr('method'),
    url: $(mid).attr('action'),
    data: datastring,
    beforeSend: function() {
        show_loader();
    },
    success: function(data) {
        setTimeout(function(){ 
          modal_response(data);
          
      }, 3000);
    },
    error: function() {
        alert($(mid).attr('action'));
        alert($(mid).attr('method'));
    }
});
        }
    function order_modal(oid)
    {
        
        
        var mid = '#order_'+oid;
        if($(mid).val())
        {
            $('#loader').show();
            var url = BASE_URL+'/api/order_modal';
              $.ajax({
                url: url,
                data: {
                order_id: oid,
                email:1,
                action: $(mid).val()
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    $(mid).val('');
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
    }
    function modal_response(data)
        {
            var obj = JSON.parse(data);
            if(obj['html'])
            {
                $('.modal-body').html(obj['html']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
        order_modal('<?= $order_id; ?>');
        
    </script>
  
</body>
</html>
    <?php
 die();

?>