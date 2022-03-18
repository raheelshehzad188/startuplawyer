<style>
    
</style>
<div class="panel">
                   <div class="dsn">
                   	<P  style="text-transform: uppercase;">CARt ITEMS</P>
                       	 <?php
				  $cart = $_SESSION['addcart'];
				  $mtot = 0;
				  $discount = 0;
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
 $sdis = 0;
 $discount = $discount + $sdis
					  ?>
                  
                  <div class="card" id="row_<?= $k ?>">
                     <div class="row container">
                          <div class="col-md-8 col-sm-8">
                              <div><b>
					 <?= $recent_author->full_name ?>
					 </b></div>
                          </div>
                        <div class="col-md-4 col-sm-4">
                        <!--  HERE--> <div class="action">
                              <svg xmlns="http://www.w3.org/2000/svg" onclick="ajax_url('https://startuplawyer.lk/main/api/wishlist?pid=<?= $pid ?>','wishlist')" viewBox="0 0 512 512" style="margin-right: 7px;"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z"/></svg>
                             
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="ajax_url('https://startuplawyer.lk/main/api/rcart?pid=<?= $k ?>','rcart')" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"/></svg>
                                
                                </div><!--  HERE-->
                        </div>
                     </div>
				
                     <div class="row align-items-center no-gutters p-md-2 container">
				        <input type="checkbox" class="chk">
                        <div class="col-lg-2">
                           <img src="<?= $pro->img; ?>" alt="here " class="img-fluid">
                        </div>
                        <div class="col-lg-4 pl-lg-3 mb-2 mb-lg-0">
                           <h2 class="h5 mb-0"><?= $pro->name?></h2>
                           <!--<span>Selected variations1,</span>
                           <span>Selected variations2,</span>-->
                           <span><?= $lang ?></span>
                        </div>
                        <div class="col-6 col-lg-2">
                           <input type="number" onchange="checkoutQty('<?= $k ?>')" id="qty_<?= $k ?>"  value="<?= $v['qty'] ?>" class="form-control">
                        </div>
                        <div class="col-6 col-lg-3 text-right">
                           <div class="h5 mb-0"id="price">LKR <?= $tot; ?></div>
                           <!--<small class="text-muted">
                           <s>$877,00</s>
                           </small>-->
                        </div>
                     </div>
					 </div>
					 <?php
				  }
					 ?>
                  <div class="card" style="margin-top: 10px; ">
                     <div class="bg-white shadow-sm rounded mb-3 p-3">
                        <div class="row align-items-center no-gutters p-md-2">
                           <div class="col-lg-7">
                              <div class="py-2">
                                 <label>Promo code:</label> <br>
                                 <input type="text" value="" class="form-control form-control-sm w-auto" name="couponcode" id="couponcode" placeholder="Coupon code" style="width: auto;" >
                              </div>
                           </div>
                           <div class="col-lg-5">
                              <div class="row no-gutters">
                                 <div class="col-6"><b>Discount tax</b></div>
                                 <div class="col-6 text-right">$<?= $discount ?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card" style="margin-top: 10px; ">
                      <div class="bg-white shadow-sm rounded mb-2 p-3">
                          <div class="p-md-4">
                              <div class="row no-gutters">
                                  <div class="col-6">
                                      <div class="h4 mb-0">Total price</div>
                                  </div>
                                <div class="col-6 text-right">
                                    <div class="h4 mb-0" id="ctot">LKR <?= $mtot; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="py-3" style="padding-top:35px;">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6">
                            <a href="<?= base_url(); ?>" class="btn btn-darks btn-primary btn-rounded px-lg-5">Shop more</a></div>
                            <div class="col-6 text-right">
							
                                <a href="?tab=login" class="btn btn-primary btn-rounded px-lg-5 nxt">Next step</a>
                            </div>
                        </div>
                  </div></div>
                    <div class="lower">
                        <h5>Who Trusts Startup lawyer?</h5>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/Bar Association of Sri lanka.jpg"  width="95"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Bar Association of Sri lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/download.jpg"  width="70"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Information & Communciation Technology Agency of Sri Lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/download1.png"  width="75"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Ceylon Chamber of Commerce </b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/download (1).jpg"  width="60"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Women Lawyers' Association</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/download (2).jpg" width="70"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Chamber of Young Lankan Entrepreneurs Sri Lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="https://startuplawyer.lk/main/assets/front/img/download (3).jpg" width="55"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Natioanl Trade Protection council</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
               </div> 
               <script type="text/javascript" >
                   function checkoutQty(i)
                   {
                       var mid ="#qty_"+i;
                    //   alert($(mid).val());
                       ajax_url('https://startuplawyer.lk/main/api/uqty?pid='+i+'&qty='+$(mid).val(),'uqty',i)
                   }
               </script>