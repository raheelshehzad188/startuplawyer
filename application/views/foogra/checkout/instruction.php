<style>
    
</style>
<div class="panel">
                    <form action="?tab=payment" method="POST">
                   <div class="container dsn">
                       <p style="text-transform: uppercase;">Special instructions</p>
                          <?php
                              $cart = $_SESSION['addcart'];
                  $mtot = 0;
                  foreach($cart as $k=> $v)
                  {
                      
                      $pid = +$v['pid'];
                      $lang = '';
                      if(isset($v['lang']))
                      {
                          $post = $product->getpost($v['lang']);
                                                if($post)
                                                {
                                                    $lang = $post->post_title;;
                                                }
                      }
                      $pro = $product->getproduct( $pid );
$terms = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
 $tot = $pro->price * $v['qty'];
 $mtot = $mtot + $tot;
                      ?>
                       <div class="card">
                       
                           <div><b> <?= $recent_author->full_name ?></b></div>
                        
                     <div class="row align-items-center no-gutters p-md-2 container">
                     <div>
                    
                     </div>
                        <div class="col-lg-2">
                           <img src="<?= $pro->img; ?>" alt="here " class="img-fluid">
                        </div>
                        <div class="col-lg-5 pl-lg-3 mb-2 mb-lg-0">
                           <h2 class="h5 mb-0"><?= $pro->name?></h2>
                           <!--<span>Selected variations1,</span>
                           <span>Selected variations2,</span>-->
                           <span><?= $lang ?></span>
                        </div>
                        <div class="col-5 col-lg-5">
                           <textarea class="form-control" name="inst[<?= $k; ?>][inst]" ><?= $v['cmt'] ?></textarea>
                        </div>
                        
                     </div>
                     </div>
                     <?php
                  }
                     ?>
                       <br><br>
                             <button type="submit" class="btn btn-primary btn-rounded px-lg-5 nxt" style="float: right;">Next step</button>>
                    </div>
                    </form>
                    <div class="lower">
                     <h5>WHAT OTHERS HAVE TO SAY?</h5>
                     <span><img src="" alt="img" ></span>
                     <span>NAME-</span>
                     <span>CITY</span>
                        <P>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</P>
                   </div>
               </div>
               