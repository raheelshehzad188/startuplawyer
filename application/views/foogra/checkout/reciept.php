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
                                            <span><?= (isset($user->full_name)?$user->full_name:"") ?></span>
                                        </div>
                                        <div class="col-6">
                                            <lable>Company Name</lable><br>
                                            <span><?= (isset($user->billing_phone)?$user->billing_phone:"") ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>whatsapp or mobile</lable><br>
                                            <span><?= (isset($user->whaatsapp)?$user->whaatsapp:"") ?></span>
                                            
                                        </div>
                                        <div class="col-6">
                                            <lable>designation</lable><br>
                                            <span><?= (isset($user->designation)?$user->designation:"") ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>email</lable><br>
                                            <span><?= (isset($user->user_email)?$user->user_email:"") ?></span>
                                        </div>
                                        <div class="col-6">
                                            
                                        </div>
                                    </div> <div class="row">
                                        <div class="col-6">
                                            <lable>address</lable><br>
                                            <span><?= (isset($user->address)?$user->address:"") ?></span>
                                        </div>
                                        <div class="col-6">
                                            <lable>district</lable><br>
                                            <span><?= (isset($user->district)?$user->district:"") ?></span>
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
                                            <span> <?= date('d/m/Y'); ?></span>
                                        </div>
                                        <div class="col-6">
                                            <lable>total items</lable><br>
                                            <span><?= count($_SESSION['addcart']); ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>order number</lable><br>
                                            <span> <?= (isset($order)?$order->order_no:"") ?></span>
                                        </div>
                                        <div class="col-6">
                                            <lable>delivery dates</lable><br>
                                            <span><?= date('d/m/Y'); ?></span>
                                            
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
                                            <span>50:55 pm</span>
                                        </div>
                                        <div class="col-6">
                                            <lable>amount</lable><br>
                                            <span><?= (isset($order)?$order->total:"") ?> LKR</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>Transaction id</lable><br>
                                            <span> <?= (isset($order)?$order->order_no:"") ?></span>
                                        </div>
                                        <div class="col-6">
                                            <lable>cart details</lable><br>
                                            <span></span>
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
                                        <p>EMAILS & NOTIFICATIONS</p>
                                    <p>You would now have received email
                                        and/or mobile notifications with
                                        order & payment details.
                                        You can look forward to receiving
                                        more such notices as order statuses
                                        change.<br>
                                        NOTE: Each item on your cart has its
                                        own Order Number for which you
                                        will receive separate notices.</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>2</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>COMMUNICATION FROM SERVICE PROVIDER</p>
                                    <p>If you ordered a <b>Service or Mediation</b>,
                                        you will receive a call, message or
                                        email from your Service Provider to
                                        establish communication when he starts
                                        work on your order.
                                        If you ordered a <b>course or webinar</b>,
                                        you will receive an email with the
                                        relevant link(s).
                                        If you <b>booked a consultation</b>, your
                                        Service Provider will prepare for the
                                        meeting using your special instructions.
                                        You will receive an email on how to
                                        prepare for your meeting please
                                        abide by those guidelines.
                                        If you ordered a <b>solution</b>, the team will
                                        get in touch with you to discuss a
                                        concerted effort moving forward.
                                    </p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>3</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>SCHEDULED UPDATES AND HIGH SERVICE QUALITY</p>
                                    <p>You will receive formal scheduled updates from your Service Provider. All
                                        his communications will be in line with
                                        high service quality levels of Client
                                        Counseling Techniques practiced by all
                                        our Service Providers.
                                    </p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                        
                        
                    </div>
                