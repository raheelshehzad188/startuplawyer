

            <ul>

                <li><a href="<?= base_url('login'); ?>">Login as Service Provider</a></li>
                <?php
                $user = array();;
                if(isset($_SESSION['knet_login']))
                {
                 $user = $_SESSION['knet_login'];   
                }
                if($user && isset($user->display_name))
                {
                    ?>
                    
                <li style="

    color: #000;

"><a href="<?= $product->dashboard_url(get_current_user_id()); ?>">Hello ,<?= $user->display_name; ?></a></li>
                    <?php
                }
                else
                {
                    ?>
                    
                <li style="

    color: #000;

"><a href="<?= $product->dashboard_url(0); ?>">Login as Client</a></li>
                    <?php
                }
                
                ?>



            </ul>

        