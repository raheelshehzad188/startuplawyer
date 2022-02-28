<?php
$pcats = array();
if(isset($edit))
$terms = get_the_terms( $edit->ID, 'product_cat' );
foreach ( $terms as $term ) {
    $pcats[] = $term->term_id;   
}
$pcats = array_unique($pcats);
?>
<section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->ID:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Title</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Title" value="<?= (isset($edit)?$edit->post_title:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                            if(isset($edit))
                                                            {
                                                                $nurl = get_the_post_thumbnail_url($edit->ID);
                                                        ?>
                                                        <img src="<?= $nurl;?>" width="40" height="40" />
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Price</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="price"  placeholder="Price" value="<?= (isset($edit)?get_post_meta($edit->ID, '_regular_price',true):''); ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Catagaries</label>
                                                            <select name="catID" class="form-control" id="basicSelect">
                                                                <?php
                                                                foreach ($cats as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value;?>" <?= (in_array($value, $pcats)?'selected':'') ?> >
                                                                        <?php
                                                                        if( $term = get_term_by( 'id', $value, 'product_cat' ) ){
    echo $term->name;
}?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </fieldset>
                                                    </div
                                                    <div class="col-12">
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Deadline</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="deadline" placeholder="Equipment" value="<?= (isset($edit)?get_post_meta($edit->ID,'dead_line', true):''); ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Add Discription</label>
                                                                <textarea name="discription" class="form-control" id="basicTextarea" rows="3" placeholder="Discription"><?= (isset($edit)?$edit->post_content:'') ?></textarea>
                                                        </fieldset>
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
                    </div>
                </section>