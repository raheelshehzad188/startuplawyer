    <?php
	$user = array();
	if(isset($_REQUEST['oid']))
	{
		$oid = $_REQUEST['oid'];
		$modal->table = 'orders';
	$order = $modal->getbyid($oid);
	if($order)
	{
		$user = $product->getuser($order->uid);
	}
	}
	?>
	<div class="panel">
                        <div class="dsn">
                            <P  style="text-transform: uppercase;">Client info</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>Name</lable><br>
                                            <input type="text" id=""  placeholder=" <?= (isset($user->full_name)?$user->full_name:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>Company Name</lable><br>
                                            <input type="text" id="" placeholder="<?= (isset($user->billing_phone)?$user->billing_phone:"") ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>whatsapp or mobile</lable><br>
                                            <input type="tel" id="" placeholder="<?= (isset($user->whaatsapp)?$user->whaatsapp:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>designation</lable><br>
                                            <input type="text" id="" placeholder="<?= (isset($user->designation)?$user->designation:"") ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>email</lable><br>
                                            <input type="email" id="" placeholder="<?= (isset($user->user_email)?$user->user_email:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            
                                        </div>
                                    </div> <div class="row">
                                        <div class="col-6">
                                            <lable>address</lable><br>
                                            <input type="text" id="" placeholder="<?= (isset($user->address)?$user->address:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>district</lable><br>
                                            <input type="text" id="" placeholder="<?= (isset($user->district)?$user->district:"") ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <P  style="text-transform: uppercase;">order details</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>order date</lable><br>
                                            <input type="text" id="" placeholder=" <?= date('d/m/Y'); ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>total items</lable><br>
                                            <input type="number" id="" placeholder="<?= count($_SESSION['addcart']); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>order number</lable><br>
                                            <input type="number" id="" placeholder=" <?= (isset($order)?$order->order_no:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>delivery dates</lable><br>
                                            <input type="text" id="" placeholder="<?= date('d/m/Y'); ?>">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <P  style="text-transform: uppercase;">payment details</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>transaction time</lable><br>
                                            <input type="time" id="" placeholder=" 509:55 pm">
                                        </div>
                                        <div class="col-6">
                                            <lable>amount</lable><br>
                                            <input type="number" id="" placeholder="<?= (isset($order)?$order->total:"") ?> LKR">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>transaction id</lable><br>
                                            <input type="number" id="" placeholder=" <?= (isset($order)?$order->order_no:"") ?>">
                                        </div>
                                        <div class="col-6">
                                            <lable>cart details</lable><br>
                                            <input type="number" id="" placeholder="************123">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                              <div class="py-3" style="padding-top:35px;">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6">
                            <a href="#" class="btn btn-darks btn-primary btn-rounded px-lg-5">Older History</a></div>
                            <div class="col-6 text-right">
                                <a href="checkout-login.html" class="btn btn-primary btn-rounded px-lg-5 nxt">My Wishlist</a>
                            </div>
                        </div>
                  </div>
                        </div>
                             <div class="lower">
                        <h5>What to expect?</h5>
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>1</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>2</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>3</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                        
                        
                    </div>
                