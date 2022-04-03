<?php
$uid = 0;
$user = $_SESSION['knet_login'];
if(isset($_SESSION['knet_login']->ID))
{
    $uid = $_SESSION['knet_login']->ID;
}
$user = $product->getuser($uid);
// var_dump($user);

$mid = 0;
$mid = get_option('payhere_merchant_id');
$actual_link = base_url('admin/admin/subscription');

$pcats = array();
?>
                    <section id="ecommerce-products" class="grid-view">
                        <?php
                        foreach($data as $key => $value)
                        {
                            $pid = $value['id'];
                            $value = $product->getproduct($value['id']);
                            
                            $pimg = $value->img;
                                $product1 = $value;


                        ?>
                        <div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <a href="app-ecommerce-details.html">
                                        <img class="img-fluid" src="<?= $pimg; ?>" alt="img-placeholder"></a>
                                </div>
                                <div class="card-body">
                                    <div class="item-name text-center" style="margin-bottom: 5px;">
                                        <a href="app-ecommerce-details.html"><?= $value->name; ?><!--<?= $pid ?>--></a>
                                        <p class="item-company">By <span class="company-name">Google</span></p>
                                    </div>
                                    <div class="pl-2 pr-2" style="margin-bottom: -8px;">
                                        <p class="item-description text-center">
                                            <?= $value->long_disc; ?>
                                        </p>
                                    </div>
                                    <div class="item-wrapper" style="margin-bottom: 8px;padding:0 85px;">
                                        <div style="font-weight: 900;">Price :</div>
                                        <h6 class="item-price">
                                            <?= $value->price;?>RS 
                                        </h6>
                                    </div>
                                    
                                        <div class="item-link text-center mb-1">
                                            <!--<a href="">View Detail</a>-->
                                        </div>
                                </div>
                                <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="<?= $mid ?>">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="<?= $actual_link ?>?type=s&user_id=<?=$uid?>">
    <input type="hidden" name="cancel_url" value="<?= $actual_link ?>?type=c&user_id=<?=$uid?>">
    <input type="hidden" name="notify_url" value="<?= base_url('/notify'); ?>">  
    <input type="hidden" name="order_id" value="<?= $pid; ?>">
    <input type="hidden" name="items" value="<?= $product1->name; ?>">
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="recurrence" value="1 Month">
    <input type="hidden" name="duration" value="Forever">
    <input type="hidden" name="amount" value="<?= $product1->price; ?>">  
    <input type="hidden" name="first_name" value="<?=$user->first_name ?>">
    <input type="hidden" name="last_name" value="<?=$user->last_name ?>">
    <input type="hidden" name="email" value="<?= $user->user_email ?>">
    <input type="hidden" name="phone" value="<?= $user->billing_phone; ?>">
    <input type="hidden" name="address" value="No.1, Galle Road">
    <input type="hidden" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka">
    <div class="item-options text-center" style="height: 46px;">
        <div class="cart" style="padding: 0;"> 
            <input type="submit" value="Buy Now">
        </div>
    </div>
</form> 
                            </div>
                        </div>
                        <?php    
                        }
                        ?>
                        
                    </section>