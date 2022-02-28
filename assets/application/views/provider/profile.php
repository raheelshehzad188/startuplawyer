<?php
//
$user = $_SESSION['knet_login'];
$uimg = get_user_img($user->ID); 
?>
<!-- account setting page start -->
                <section id="page-account-settings">
                    <?php $this->load->view('flash');?>
                    <div class="row">

                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-bank" data-toggle="pill" href="#account-vertical-bank" aria-expanded="false">
                                        <i class="fa fa-money mr-50 font-medium-3"></i>
                                        Bank Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-policy" data-toggle="pill" href="#account-vertical-policy" aria-expanded="false">
                                        <i class="feather icon-user mr-50 font-medium-3"></i>
                                        Service provider policy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Social links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-feather mr-50 font-medium-3"></i>
                                        Connections
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Notifications
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form action="<?= base_url('provider/admin/profile'); ?>?general=1"  method="post" enctype="multipart/form-data" novalidate>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="<?= $uimg; ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div  class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                            <input name="pimg" type="file" id="account-upload" hidden>
                                                            <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                                        <?php
                                                        if($product->getmeta('user',$user->ID, 'varified',true))
                                                        {
                                                            ?>
                                                            <div class="alert alert-success"><i class="feather icon-check mr-1"></i><span>Your account is varified</span></div>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <div class="alert alert-danger"><i class="feather icon-x mr-1"></i><span>Your account is not varified</span></div>
                                                            <?php
                                                        }
                                                ?>
                                                <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Username</label>
                                                                    <input type="text" class="form-control" id="account-username" placeholder="Username" value="<?=  $user->user_login; ?>" required data-validation-required-message="This username field is required" readonly = "true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">First Name</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name"  name="first_name" value="<?=$product->getmeta('user',$user->ID,'first_name',true) ?>" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Last Name</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name"  name="last_name" value="<?=$product->getmeta('user',$user->ID,'last_name',true) ?>" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="<?= $user->user_email ?>" required data-validation-required-message="This email field is required" name="user_email" v>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button name="general" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="account-vertical-bank" aria-labelledby="account-pill-bank" aria-expanded="true">
                                                <form action="<?= base_url('provider/admin/profile'); ?>?bank=1"  method="post" enctype="multipart/form-data" novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Beneficiary Name</label>
                                                                    <input type="text" class="form-control" id="account-username" placeholder="Username" value="<?=  $product->getmeta('user',$user->ID,'account_title',true); ?>" name="account_title" required data-validation-required-message="This username field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Beneficiary Account No.</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name"  name="account_no" value="<?=  $product->getmeta('user',$user->ID,'account_no',true); ?>" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Beneficiary Bank Code</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name"  name="bank_code" value="<?=  $product->getmeta('user',$user->ID,'bank_code',true); ?>" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Beneficiary Branch Code</label>
                                                                    <input type="text" class="form-control" id="account-e-mail" placeholder="Email" value="<?=  $product->getmeta('user',$user->ID,'branchh_code',true); ?>" required data-validation-required-message="This email field is required" name="branchh_code" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button name="bank" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form action="<?= base_url('provider/admin/profile'); ?>?chpass=1"  method="post" enctype="multipart/form-data" novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">New Password</label>
                                                                    <input type="password" name="npass" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Retype New
                                                                        Password</label>
                                                                    <input type="password" name="cpass" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form action="<?= base_url('provider/admin/profile'); ?>?bio=1"  method="post" enctype="multipart/form-data" novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Bio</label>
                                                                <textarea class="form-control" name="description" id="accountTextarea" rows="3" placeholder="Your Bio data here..."><?=$product->getmeta('user',$user->ID,'description',true); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Language</label>
                                                                <div class="wp-tab-panel">
                                                                    <ul>
                                                                        <?php
                                                                        $ucats = $product->getmeta('user',$user->ID,'lang',true);
                                                                        $ucats = explode(',',$ucats);
                                                                        // print_r($ucats);
                                                                        
                                                                         $all_categories = array();  /*wp_get_recent_posts(array(
                                                                                "numberposts" => -1, // Number of recent posts thumbnails to display
                                                                                "post_status" => 'publish', // Show only the published posts
                                                                                "post_type"=>'search_language'
                                                                            ));*/
                                                                            
                                                                            foreach($all_categories as $cat) : ?>
                                                                            <?php
                                                                            ?>
                                                                        <li style="display:block;"  ><label><input type="checkbox" name="lang[]" value="<?php echo $cat['ID']; ?>" <?= in_array($cat['ID'],$ucats)?"checked":""; ?> ><?php echo $cat['post_title'] ?></label></li>
                                                                        <?php endforeach;?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Type</label>
                                                                <div class="wp-tab-panel">
                                                                    <ul>
                                                                        <?php
                                                                        $ucats = $product->getmeta('user',$user->ID,'type',true);
                                                                        $ucats = explode(',',$ucats);
                                                                        // print_r($ucats);
                                                                        
                                                                        $all_categories = array();  /*wp_get_recent_posts(array(
                                                                        "numberposts" => -1, // Number of recent posts thumbnails to display
                                                                        "post_status" => 'publish', // Show only the published posts
                                                                        "post_type"=>'search_from'
                                                                        ));*/

                                                                        foreach($all_categories as $cat) : ?>
                                                                        <?php
                                                                        ?>
                                                                        <li style="display:block;"  ><label><input type="checkbox" name="type[]" value="<?php echo $cat['ID']; ?>" <?= in_array($cat['ID'],$ucats)?"checked":""; ?> ><?php echo $cat['post_title'] ?></label></li>
                                                                        <?php endforeach;?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Practice Area</label>
                                                                <div class="wp-tab-panel">
                                                                    <ul>
                                                                        <?php
                                                                        $ucats = $product->getmeta('user',$user->ID,'area',true);
                                                                        $ucats = explode(',',$ucats);
                                                                                                // print_r($ucats);
                                                                                                
                                                                         $all_categories = array();
                                                                         /*wp_get_recent_posts(array(
                                                                            "numberposts" => -1, // Number of recent posts thumbnails to display
                                                                            "post_status" => 'publish', // Show only the published posts
                                                                            "post_type"=>'area'
                                                                        ));*/
                                                                            
                                                                            foreach($all_categories as $cat) : ?>
                                                                            <?php
                                                                            ?>
                                                                        <li style="display:block;"  ><label><input type="checkbox" name="area[]" value="<?php echo $cat['ID']; ?>" <?= in_array($cat['ID'],$ucats)?"checked":""; ?> ><?php echo $cat['post_title'] ?></label></li>
                                                                        <?php endforeach;?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">District</label>
                                                                <?php
                                                $udis = $product->getmeta('user',$user->ID,'district',true);
                                                ?>
                                                <select name="district" class="form-control" id="accountSelect">
                                                <option >Selet District</option>
                                                <?php
                                                $all_categories = array(); /*wp_get_recent_posts(array(
                                                "numberposts" => -1, // Number of recent posts thumbnails to display
                                                "post_status" => 'publish', // Show only the published posts
                                                "post_type"=>'distric'
                                            ));*/
    
                                        foreach($all_categories as $cat) : ?>
                                            <option value="<?= $cat['ID'] ?>" <?= (($cat['ID'] == $udis)?"selected":""); ?>><?= $cat['post_title']; ?></option>
                                            <?php endforeach;?>
                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">Intro video Link</label>
                                                                <input type="text"  name="intro_video" class="form-control" value="<?= $product->getmeta('user',$user->ID,'intro_video', true); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">Whatsapp Phone number</label>
                                                                <input type="text"  name="whaatsapp" class="form-control" value="<?= $product->getmeta('user',$user->ID,'whaatsapp', true); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">First Free Consultation</label>
                                                                <input type="checkbox"  style="
                                                                font-size: 1px;margin-left: 50px;" name="first_free_cons" class="" value="1" <?= ($product->getmeta('user',$user->ID,'first_free_cons',true) == 1)?"checked":""; ?>/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">Refund Guarantee</label>
                                                                <input type="checkbox"  style="
                                                                font-size: 1px;margin-left: 50px;" name="refund" class="" value="1" <?= ($product->getmeta('user',$user->ID,'refund',true) == 1)?"checked":""; ?>/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Phone</label>
                                                                    <input type="text" class="form-control" id="account-phone" required placeholder="Phone number" value="<?= $product->getmeta('user',$user->ID,'billing_phone',true) ?>" name="billing_phone" data-validation-required-message="This phone number field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Website</label>
                                                                <input type="text" class="form-control" id="account-website" placeholder="Website address">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="musicselect2">Favourite Music</label>
                                                                <select class="form-control" id="musicselect2" multiple="multiple">
                                                                    <option value="Rock">Rock</option>
                                                                    <option value="Jazz" selected>Jazz</option>
                                                                    <option value="Disco">Disco</option>
                                                                    <option value="Pop">Pop</option>
                                                                    <option value="Techno">Techno</option>
                                                                    <option value="Folk" selected>Folk</option>
                                                                    <option value="Hip hop">Hip hop</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="moviesselect2">Favourite movies</label>
                                                                <select class="form-control" id="moviesselect2" multiple="multiple">
                                                                    <option value="The Dark Knight" selected>The Dark Knight
                                                                    </option>
                                                                    <option value="Harry Potter" selected>Harry Potter</option>
                                                                    <option value="Airplane!">Airplane!</option>
                                                                    <option value="Perl Harbour">Perl Harbour</option>
                                                                    <option value="Spider Man">Spider Man</option>
                                                                    <option value="Iron Man" selected>Iron Man</option>
                                                                    <option value="Avatar">Avatar</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-policy" role="tabpanel" aria-labelledby="account-pill-policy" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                    <textarea name="editor1"></textarea>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-google">Google+</label>
                                                                <input type="text" id="account-google" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-quora">Quora</label>
                                                                <input type="text" id="account-quora" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                            <strong>Twitter</strong></a>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to facebook.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                            <strong>Google</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to Instagram.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">Activity</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                            <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me when someone comments
                                                                onmy
                                                                article</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                            <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Email me when someone answers on
                                                                my
                                                                form</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                            <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                            <span class="switch-label w-100">Email me hen someone follows
                                                                me</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-1">Application</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                            <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                            <span class="switch-label w-100">News and announcements</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                            <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                            <span class="switch-label w-100">Weekly product updates</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                            <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                            <span class="switch-label w-100">Weekly blog digest</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->