<div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="<?= $assets; ?>app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                                        <img src="<?= $assets; ?>app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Congratulations Harsh,</h1>
                                            <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Users</h4>
                                    <div class="dropdown chart-dropdown">
                                        <button class="d-nonebtn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $dtit ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem4">
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=1">Last 1 day analytics</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=30">Last 1 Month</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=90">Last 3 Month</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=180">Last 6 Month</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=270">Last 9 Month</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>?days=365">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="product-order-chart" class="mb-3"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">Wel-Wishers</span>
                                            </div>
                                            <div class="product-result">
                                                <span><?= $tw24 ?></span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">Receivers</span>
                                            </div>
                                            <div class="product-result">
                                                <span><?= $tr24 ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Earnings</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                            <li>
                                                <div class="timeline-icon bg-success">
                                                    <i class="feather icon-check font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Current Balance </p>
                                                    <span class="font-small-3"><?= $balance =(int) get_option('admin_balence'); ?>Rs</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-plus font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Last 24 hours Earning</p>
                                                    <span class="font-small-3"><?= $p1; ?>Rs</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-plus font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Last 7 days Earning</p>
                                                    <span class="font-small-3"><?= $p7 ?>Rs</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-plus font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Last 1 month Earning</p>
                                                    <span class="font-small-3"><?= $p30 ?>Rs</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-plus font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Last 1 year Earning</p>
                                                    <span class="font-small-3"><?= $p365 ?>Rs</span>
                                                </div>
                                            </li>
                                            <li style="display:none;">
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-check font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Marketing</p>
                                                    <span class="font-small-3">Candy ice cream. Halvah bears Cupcake gummi bears.</span>
                                                </div>
                                                <small class="text-muted">28 days ago</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 d-none hidden">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25"><?= $p1; ?>Rs</h2>
                                    <p class="mb-0">Last 24 hours earning</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 d-none hidden">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25"><?= $p7; ?>Rs</h2>
                                    <p class="mb-0">Last 1 week earning</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row match-height  d-none hidden">
                        
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25"><?= $p30; ?>Rs</h2>
                                    <p class="mb-0">Last 1 month earning</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25"><?= $p365; ?>Rs</h2>
                                    <p class="mb-0">Last 1 Year earning</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">State Users</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAME</th>
                                                    <th>WELL-WISHERS</th>
                                                    <th>RECIVERS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($states as $k => $user)
                                                {
                                                    if($k < 5)
                                                    {
                                                    ?>
                                                    <tr>
                                                    <td><?= $k+1; ?></td>
                                                    <td><?= $name = $user['name'];?></td>
                                                    <td><?= $name = $user['w'];?></td>
                                                    <td><?= $name = $user['r'];?></td>
                                                </tr>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>