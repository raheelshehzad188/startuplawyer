<style>
    .form-group1{
        overflow: hidden;
        display: flex;
        padding: 10px 0px;
    }
    .form-group1 input{
        float: left;
    width: 15px;
    height: 23px;
    margin-right: 10px;
    }
    .w-50{
        width:50%;
        float:left;
    }
</style>

<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->ID:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');
                                            // var_dump($edit);
                                            ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">First Name</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="fname" placeholder="Name" value="<?= (isset($edit)?get_user_meta($edit->ID,'first_name',true):'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Last Name</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="lname" placeholder="Name" value="<?= (isset($edit)?get_user_meta($edit->ID,'last_name',true):'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Email</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="email" placeholder="Name" value="<?= (isset($edit)?$edit->user_email:'') ?>" <?= (isset($edit)?'readonly':'') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Password</label>
                                                            <input type="password" id="email-id-vertical" class="form-control" name="pass" placeholder="Name" value="">
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>