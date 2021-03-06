<?php
$pcats = array();
 
 $modal->table = 'category';
 $modal->key = 'id';
 $cats = $modal->get(array('status'=>0,'parent'=>0));
?>
<section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->id:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Title</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Title" value="<?= (isset($edit)?$edit->name:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Service Provider</label>
                                                            <select name="post_author" class="form-control" >
                                                                                 <option>Select Provider</option>
                      <?php

//service_provider
$modal->table = 'wp_users';
$modal->key = 'ID';
$users = $modal->get( array() );

// echo '<ul>';
foreach ( $users as $user ) {
    $user = $product->getuser($user['ID']);
    $userID = $user->ID;
    if(in_array('service_provider',$user->roles))
    {
    ?>
                      <option value="<?= $user->ID; ?>"<?= (isset($edit->uid) && $edit->uid == $user->ID)?"selected":'' ?>><?= $user->ID.'- '.$product->getmeta('user',$userID,'first_name',true).' '.$product->getmeta('user',$userID,'last_name',true); ?></option>
                      <?php
    }
}
    ?>
                                                                
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file (500 X 500) </label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                        $pimg = '';
                                                        if(isset($edit))
                                                        {
                                                        $pimg = $product->getimg($edit->img);
                                                        ?>
                                                        <img src="<?= $pimg;?>" width="40" height="40" />
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Price</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="price"  placeholder="Price" value="<?= (isset($edit->price))?$edit->price:""; ?>">
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <?php
                                                            
                                                            $types = array(
                                                                1=> 'simple',
                                                                2=> 'variable',
                                                                );
                                                            ?>
                                                            <label for="basicInputFile">Product Type</label> 
                                                            <select name=product_type class="form-control">
                                                                <?php
                                                                $types = array(
                                                                    '0'=> 'simple' ,
                                                                    '1'=> 'variable' ,
                                                                    );
                                                                foreach($types as $k => $v)
                                                                {
                                                                    ?>
                                                                    <option value="<?= $k; ?>" <?= (isset($edit->type) && $edit->type == $k)?"selected":""; ?>><?= $v ?></option>
                                                                    <?php
                                                                }
                                                                
                                                                ?>    
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Categories</label>
                                                            <select onchange="chcat('<?= (isset($edit)?$edit->id:'0');?>')" name="catID" class="form-control" id="catID">
                                                                <option value="0" >Select Category</option>
                                                                <?php
                                                                foreach ($cats as $key => $value) {
                                                                    
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (isset($edit->catID) && $edit->catID == $value['id'])?'selected':''; ?> >
                                                                        <?php   echo $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">SKU
                                                            </label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="_sku" placeholder="Equipment" value="<?= (isset($edit->sku))?$edit->sku:""; ?>">
                                                        </fieldset>
                                                        
                                                    </div>
                                                  
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Deadline</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="dead_line" placeholder="Deadline" value="<?= (isset($edit->dead_line)?$edit->dead_line:'0'); ?>">
                                                        </fieldset>
                                                   
                                                          <fieldset class="form-group">
                                                           <label for="basicInputFile">Status</label><br>
                                                              <select name="catID" class="form-control" id="publish">
                                                                <option value="0" <?= (isset($edit) && $edit->publish == 0)?"selected":""; ?>>Published</option>
                                                                <option value="1" <?= (isset($edit) && $edit->publish == 1)?"selected":""; ?> >Unpublished</option>

                                                                <?php
                                                               
                                                                ?>
                                                                
                                                            </select>
                                                           </fieldset>
                                            
                                                  </div>  
                                                  
                                                    <div class="col-12" id="cat_data" style="display:none;">
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Short Description</label>
                                                                <textarea name="short_discription" class="short_discription editor form-control"rows="3" placeholder="Discription"><?= (isset($edit)?$edit->short_disc:'') ?></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Long Description</label>
                                                                <textarea name="discription" class="long_discription editor form-control" id="basicTextarea" rows="3" placeholder="Discription"><?= (isset($edit)?$edit->long_disc:'') ?></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Tags</label> 
                                                            <?php
                                                            $ptags = array();
                                                            if(isset($edit))
                                                            {
                                                            $modal->table= 'product_to_tags';
                                                            $modal->key = 'id';
                                                            $db= $modal->get(array('pid'=>$edit->id));
                                                            foreach($db as $k=> $v)
                                                            {
                                                               $ptags[] = $v['tid'];
                                                            }
                                                            }
                                                            ?>
                                                            <select class="select2 form-control" name="tags[]"    multiple="multiple">
                                                                <?php
                                                                if(isset($ptags))
                                                                {
                                                                    $arr = $ptags;
                                                                    
                                                                    foreach ($tags as $key => $value) {
                                                                        // var_dump();
                                                                    ?>
                                                                    <option value="<?= $value['ID'];?>" <?= (in_array($value['ID'], $arr)?'selected="true"':'')?>><?= $value['post_title'];?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($tags as $key => $value) {
                                                                    ?> 
                                                                    <option value="<?= $value['ID'];?>"><?= $value['post_title'];?></option>
                                                                    <?php
                                                                }   
                                                                }
                                                                
                                                                ?>
                                                                >
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Locations</label> 
                                                            <?php
                                                            $locs = array();
                                                            if(isset($edit))
                                                            {
                                                            $modal->table= 'product_to_locations';
                                                            $modal->key = 'id';
                                                            $db= $modal->get(array('pid'=>$edit->id));
                                                            foreach($db as $k=> $v)
                                                            {
                                                               $locs[] = $v['tid'];
                                                            }
                                                            }
                                                            
                                                            ?>
                                                            <select class="select2 form-control" name="locations[]"    multiple="multiple">
                                                                <?php
                                                                if(isset($locs))
                                                                {
                                                                    if(!is_array($locs))
                                                                    $locs = array($locs);
                                                                    $arr = $locs;
                                                                    
                                                                    foreach ($locations as $key => $value) {
                                                                        // var_dump();
                                                                    ?>
                                                                    <option value="<?= $value['ID'];?>" <?= (in_array($value['ID'], $arr)?'selected="true"':'')?>><?= $value['post_title'];?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($locations as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['ID'];?>"><?= $value['post_title'];?></option>
                                                                    <?php
                                                                }   
                                                                }
                                                                
                                                                ?>
                                                                >
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Languages</label> 
                                                            <?php
                                                            $plng = array();
                                                            if(isset($edit))
                                                            {
                                                            $modal->table= 'product_to_languages';
                                                            $modal->key = 'id';
                                                            $db= $modal->get(array('pid'=>$edit->id));
                                                            foreach($db as $k=> $v)
                                                            {
                                                               $plng[] = $v['tid'];
                                                            }
                                                            }
                                                            if(!is_array($plng))
                                                            {
                                                                $arr = array($plng);
                                                                $plng = $arr;
                                                            }
                                                            ?>
                                                            <select class="select2 form-control" name="lanaguage[]" multiple="multiple">
                                                                <option value="0" >Select Language</option>
                                                                <?php
                                                                if(isset($edit))
                                                                {
                                                                    $arr = $ptags;
                                                                    foreach ($lanaguages as $key => $value) {
                                                                        // var_dump();
                                                                    ?>
                                                                    <option value="<?= $value['ID'];?>" <?= (in_array($value['ID'],$plng))?'selected="true"':'';?>><?= $value['post_title'];?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($lanaguages as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['ID'];?>"><?= $value['post_title'];?></option>
                                                                    <?php
                                                                }   
                                                                }
                                                                
                                                                ?>
                                                                >
                                                            </select>
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
                <script>
                function show_loader1(){
            var html = '<img src="<?= base_url('assets/front/img/load.gif'); ?>" style="width: 48px;margin-left: 400px;" />';
                $('#cat_data').html(html);
                $('#cat_data').show(html);
        }
                function chcat(pid){
                    show_loader1();
                    // alert(pid);
                    // alert($('#catID').val());
                    var  datastring = {'product':pid,'cat':$('#catID').val()};
                    var surl = '<?= base_url("/index/page/cat_fields"); ?>';
                    // alert(surl);
$.ajax({
    type: 'get',
    
    url: surl,
    
    data: datastring,
    beforeSend: function() {
        show_loader1();
    },
    success: function(data) {
        setTimeout(function(){ 
          $('#cat_data').show();
          $('#cat_data').html(data);
          $('.select2').select2();

          
      }, 3000);
    },
    error: function() {
        $('#cat_data').hide();
    }
});
        }
                    $(document).ready(function(){
                        chcat('<?= (isset($edit)?$edit->id:'0');?>')
                    });
                </script>