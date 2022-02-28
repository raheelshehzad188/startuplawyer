<style>
    .clearfix ul#menu-header-menu li a {
    color: #494444;
}
</style>
<main class="bg_gray pattern">
		
		<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-lg-4">
		        	<div class="sign_up">
		                <div class="head">
		                    <div class="title">
		                    <h3>Sign Up</h3>
		                </div>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                	<a href="#0" class="social_bt facebook" onclick="tlogin();">Login with Facebook</a>
				<a href="#0" class="social_bt google"  id="googleSignIn">Login with Google</a>
							<div class="divider"><span>Or</span></div>
		                	<h6>Personal details</h6>
		                	<form method="post" action="<?= base_url(); ?>auth/create" id="register_form" >
		                        <?php
		                        $this->load->view('flash');
		                        ?>
                                            <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                             <label for="inputName">User Name</label>
                                                                <input type="text" id="inputName" class="form-control" placeholder="User Name" name="uname" required="">
                                                            </div>
                                                        </div>
                                                        </div>
                                                         <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                            <label for="inputEmail">Email</label>
                                                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                               
                                                                <div class="form-label-group">
                                                                    <label for="inputPassword">Password</label>
                                                                <input type="password" id="inputPassword" name="upass" class="form-control" placeholder="Password" required="">
                                                             
                                                            </div>
                                                        </div>
                                                            </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                                 <label for="inputConfPassword">Confirm Password</label>
                                                                <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" name="cpass" required="">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                                 <label for="inputConfPassword">Signup as</label>
                                                                <select name="role"  class="form-control">
                                                                    <option value="customer">Customer</option>                            <option value="draft_provider">Service Provider</option>
                                                                </select>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <button class="btn_1 full-width mb_5" type="submit" >Submit</button>
                                                
                                                <div class="text-center1">
                                               <div> Did you have account?</div>
                                               <div><a id="sign-in1" href="#">Sign in </a></div>
                                                </div>
</form> 
		                    
		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>
		        <!-- /col -->

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->
	