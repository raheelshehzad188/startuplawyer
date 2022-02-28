<?php
$user = $_SESSION['knet_login']->data;
$uimg = get_user_img($user->ID);

?>
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
    <!-- END: Page CSS-->
    <!-- END: chat CSS-->
    <!-- END: Page CSS-->
    <!-- BEGIN: Vendor CSS-->
    <?php
    if(isset($css))
    {
        foreach ($css as $key => $value) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= $value?>">
            <?php
        }
    }
    ?>
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<body>
    <div  class="icon text-center">
        <?php if ($type == 1) {
            echo '<i class="feather icon-check" style="font-size: 107px;border: 7px solid;text-align: center;border-radius: 58px;color: green;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);"></i> <p style="margin-top: 100px;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">'.$txt.'</p>';

        }
        else if($type == 2)
        {
            ?>
            I m here 
            <?php
        }
        else{
            echo '<i class="fa fa-times ?>" style="width:124px;font-size: 107px;border: 7px solid;text-align: center;border-radius: 58px;color: #ff2a2a;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);"></i><p style="margin-top: 100px;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">'.$txt.'</p>';
        }
        
        ?>
        
        
    </div>
</body>
</html>