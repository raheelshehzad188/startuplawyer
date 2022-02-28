

            <ul>

                <li><a href="<?= panel_url('login'); ?>">Login as Service Provider</a></li>
                <?php
                $user = wp_get_current_user();
                if($user && $user->display_name)
                {
                    ?>
                    
                <li style="

    color: #000;

"><a href="<?= dashboard_url(get_current_user_id()); ?>">Hello ,<?= $user->display_name; ?></a></li>
                    <?php
                }
                else
                {
                    ?>
                    
                <li style="

    color: #000;

"><a href="<?= dashboard_url(0); ?>">Login as Client</a></li>
                    <?php
                }
                
                ?>



            </ul>

        