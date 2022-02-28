<ul id="top_menu">
    <?php
    $ccount = 0;
    ?>
            <li><a href="<?= base_url(); ?>/cart" title="Your cart"><img src="<?= get_assets_url(); ?>/img/cart2.png" class="cartImg" >
                <?php
                if($ccount > 0)
                {
                    ?>
                    <div class="cdiv">
                    <span class="count"><?= $ccount; ?></span>
                    </div>
                    <?php
                } 
                ?>
                </a></li>

        </ul>

        <!-- /top_menu -->

        <a href="#0" class="open_close" id="mobile_menu">

            <i class="icon_menu"></i><span>Menu</span>

        </a>
        <nav class="main-menu">

            <div id="header_menu">

                <a href="#0" class="open_close" id="mobile_menu2">

                    <i class="icon_close"></i><span>Menu</span>

                </a>

                <a href="<?= base_url(); ?>"><img src="<?= get_option( 'site_logo', $url.'img/logo2.png' ) ?>" width="140" height="35" alt=""></a>



            </div>
            <div class="include">
                <div class="menu-main-menu-container"><ul id="menu-main-menu" class="menu"><li id="menu-item-1065" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-12 current_page_item menu-item-1065"><a href="https://startuplawyer.lk/dev/" aria-current="page">Home</a></li>
<li id="menu-item-7521" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7521"><a href="https://startuplawyer.lk/dev/benefits/">Benefits</a></li>
<li id="menu-item-7522" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7522"><a href="https://startuplawyer.lk/dev/how-it-works/">How it works</a></li>
<li id="menu-item-1068" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1068"><a href="https://startuplawyer.lk/dev/blog/">Free Resources</a></li>
<li id="menu-item-7524" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7524"><a href="https://startuplawyer.lk/dev/pricing-plans/">Pricing &amp; Plans</a></li>
<li id="menu-item-7525" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7525"><a href="https://startuplawyer.lk/dev/help/">Help</a></li>
</ul></div>

            <?php
            // include "top-header.php";

            ?>
        </div>

            

        </nav> 