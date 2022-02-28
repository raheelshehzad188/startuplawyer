<ul id="top_menu">
		    <?php
		    if(get_current_user_id())
		    {
		        ?>
		     <li><a href="<?= dashboard_url(get_current_user_id()); ?>"><img id="dashboardImg" src="https://startuplawyer.lk/main/assets/front/img/dashboard.png"  width="35" height="35" ></a></li>
		        <?php
		    }
		    else
		    {
		        ?>
		        <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
		        <?php
		    }
		    ?>
			<li>
			    	<div id="cart">
			<a href="<?= get_option('siteurl'); ?>">

				<img id="cartImg" class="cartImg" src="https://startuplawyer.lk/main/assets/front/img/cart.png" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
			<li>
			    	<div id="heart">
			<a href="<?= base_url('index/wishlist'); ?>">

				<img id="heartImg" class="heartImg" src="https://startuplawyer.lk/main/assets/front/img/hblack.png" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
		<nav class="main-menu">
			<div id="header_menu">
				<a href="#0" class="open_close">
					<i class="icon_close"></i><span>Menu</span>
				</a>
				<a href="index.html"><img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal" style="background-color:white;"></a>

			</div>
			<!--<ul>-->
			<!--	<li class="submenu">-->
				    
			<!--		<a href="#0" class="show-submenu">Home</a>	</li>-->
			<!--	<li><a href="listing.html">Benefits</a></li>-->
			<!--	<li><a href="#">How it works</a></li>-->
			<!--	<li><a href="#">Free Resources </a></li>-->
			<!--	<li><a href="#">Plans & Pricing </a></li>-->
			<!--	<li><a href="#">Help </a></li>-->
			<!--</ul>-->
			<?php

            wp_nav_menu( array(

    'theme_location' => 'main-menu'

) );
            // include "top-header.php";

            ?>
		</nav>