<!-- BEGIN: Main Menu-->
<?php 
$url = get_assets_url();
$user = $_SESSION['knet_login'];
$ppack = $product->getmeta('user',$user->ID,'ppack',true);
if(in_array('service_provider',$user->roles)|| in_array('draft_provider',$user->roles))
{
// $ppack = 1143;
?>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?= get_option( 'sticky_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <?php
                if ($ppack) {
                    $product = wc_get_product( $ppack );
                    $img = $product->get_image_id();

                    ?>
                    <li class=" nav-item pbadge">
                        <img src="<?= wp_get_attachment_image_src($img)[0]; ?>" height="60" width="60"/><span style="margin-left: 17px;font-weight: 500;"><?= $product->get_name(); ?></span>
                        </li>
                <li class=" nav-item"><a href="<?= base_url('provider/admin'); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <li class=" nav-item"><a href="<?= base_url('provider/admin/chat'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Chat</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Ecommerce">Products </span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url('provider/products/create');?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Add Product</span></a>
                        </li>
                        <li><a href="<?= base_url('provider/products/all');?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Manage Products</span></a>
                        </li>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li class=" nav-item"><a href="<?= base_url('provider/admin/subscription'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Subscription</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>

                <li class=" nav-item"><a href="<?= base_url('provider/admin/profile'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Profile</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <li class=" nav-item"><a href="<?= base_url('provider/admin/myorder'); ?>"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Dashboard">My Orders</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>

                <li class=" nav-item"><a href="<?= base_url('provider/admin/payments'); ?>"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Dashboard">Payments</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <li class=" nav-item"><a href="<?= base_url('provider/admin/rating'); ?>"><i class="feather icon-star"></i><span class="menu-title" data-i18n="Dashboard">Rating</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
            </ul>
                
        </div>
    </div>
    <?php
}
else
{
    ?>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?= get_option( 'sticky_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item"><a href="<?= base_url('admin/admin/profile'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Profile</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                if(check_permission('service_provider'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/provider/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Service Provider</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('products'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/products/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Products</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('tag'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/tags/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Product Tags</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('lang'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/lang/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Language</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                <li class=" nav-item"><a href="<?= base_url('admin/location/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Location</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('lang'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/option/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Theme Option</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <li class=" nav-item"><a href="<?= base_url('admin/templates/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Email Templates</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <li class=" nav-item"><a href="<?= base_url('admin/params/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Email Params</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                if(check_permission('sub_admin'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/user/all'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Sub Admin</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('facilitate'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/admin/page/facilitate'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Facilitate</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('order'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/admin/page/order'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Order</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(check_permission('payment'))
                {
                    ?>
                <li class=" nav-item"><a href="<?= base_url('admin/admin/page/pay'); ?>"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Payment</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
                <?php
                }
                ?>
                <li class=" nav-item"><a href="<?= base_url('admin/admin/page/chat_bots'); ?>"><i class="feather feather-message-square"></i><span class="menu-title" data-i18n="Dashboard">Chat bots & FAQ's</span><span class="badge badge badge-warning badge-pill float-right mr-2 d-none">2</span></a>
                </li>
            </ul>
                
        </div>
    </div>
    <?php
}
    ?>