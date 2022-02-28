
        </div>
        </div>
    </div>
<!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="<?= base_url(); ?>" target="_blank">2021 Startup Lawyer (Pvt) Ltd,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <script type="text/javascript">
        var BASE_URL = "<?=(isset($url)?$url:base_url())?>";
    </script>
    <?php
    function get_earning($uid, $month)
    {
        $cy = date("Y");
        $f = $cy.'-'.$month.'-'.'1';
        $f = date('Y-m-d', strtotime($f));
        $t = $cy.'-'.$month.'-'.'31';
        $t = date('Y-m-d', strtotime($t));
        $CI =& get_instance();
        $CI->load->model('Common_model');
		$modal = $CI->Common_model;
        $modal->table = 'wp_posts';
		$modal->key = 'ID';
		$earning = 0;
		$all  = $modal->get(array('post_type'=>'transection'));
        foreach($all as $k=> $v)
        {
            $pdate = $f = date('Y-m-d', strtotime($v['post_date']));
            $CI =& get_instance();
            $CI->load->model('Product_model');
		    $product = $CI->Product_model;
            $puid = $product->getmeta('post',$v['ID'],'user',true);
            // if($month == 12 && $v['ID'] == 6931)
            // {
            //     if($pdate >= $f &&  $pdate <=$t)
            //     {
            //         print_r($v);
            //     die($puid);
            //     }
                
            // }
            if($pdate >= $f && $pdate <=$t && $puid == $uid)
            {
                
                $earning = $earning + $product->getmeta('post',$v['ID'],'earned',true);
            }
        }
        return $earning;
    }
    $months = array();
    $earning = array();
    $cmo = date('m');
    $user = $_SESSION['knet_login'];
$uid = $user->ID;
    for($i = 1; $i<= $cmo;$i++)
    {
        
        $m = $i;
        $earning[] = get_earning($uid, $m);
        $dateObj   = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
        $months[] = $monthName;
    }
    function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}
    function js_array($array)
{
    $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}
?>
    <script type="text/javascript">
        var months = <?= js_array($months); ?>;
        var earning = <?= js_array($earning); ?>;
    </script>
    <!-- END: Footer-->
    <!-- START: Send Sms-->
    <!-- Modal -->
  <div class="modal fade" id="sndSmsModal" role="dialog">
    <div class="modal-dialog">
    <div class="forloader"><div class="loader"></div></div>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="form">
              <input type="text" name=" number" id="cnum" class="form-control"/>
              <input type="texxt" name="couponID" id = "couponID"/ style="visibility:hidden; ">
              <input type="texxt" name="type" id = "rtype" style="visibility:hidden; ">
              <button id="modsubmit" onclick="send_single()" class="vs-button-text vs-button--text">Send</button>
          </div>
        </div>
        
      
    </div>
  </div>
    <!-- End: Send Sms-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= $assets?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= $assets?>app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <!-- BEGIN: Theme JS-->
    <script src="<?= $assets?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= $assets?>app-assets/js/core/app.js"></script>

    <script src="<?= $assets?>app-assets/js/scripts/components.js"></script>
                    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '.editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.log( "error" );
                                } );
                        ClassicEditor
                                .create( document.querySelector( '.long_discription' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.log( "error" );
                                } );
                </script>

    <!-- END: Theme JS-->
    <!---all tags--->
    <?php
    if(isset($js))
    {
        foreach ($js as $key => $value) {
            ?>
           
            <script src="<?= $value; ?>"></script>
            <?php
        }    }
    ?>
    <script>
            // CKEDITOR.replace( 'editor1' );
    </script>
        <!-- BEGIN: Page Vendor JS-->
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?= $assets?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="<?= $assets?>app-assets/js/scripts/datatables/datatable.js"></script>
    <!-- END: Page JS-->
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>


    <!-- BEGIN: Page JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <!-- END: Page JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            
    $('.select2').select2();
});
        function sendSingle(id)
        {
            $('#modsubmit').text('Assign');
            $('#sndSmsModal').modal('show');
            $('#couponID').val(id);

        }
        function send_single(){
            var type=$('#rtype').val();
            var data = {
    number: $('#cnum').val(),
    coupon: $('#couponID').val(),
    type: $('#rtype').val()
  };
            $.post("<?= base_url();?>/api/send_coupon",
  data,
  function(data, status){
    var obj = JSON.parse(data);
    console.log(obj);
    if(obj.status)
    {
        swal("Good job!", obj.msg, "success");
        location.reload();

    }
    else
    {
        swal({
  title: "Sorry!",
  text: obj.msg,
  icon: "error",
});
}
  });
        }
        function send_group()
        {
            var cop = '';
            $('.coupon_check').each(function(i, obj) {
                console.log(i);
                if($(this).prop("checked"))
                {
                    cop += $(this).val()+',';
                    // console.log($(this).val());
                }
            });
     $('#sndSmsModal').modal('show');
            $('#couponID').val(cop);
        }
        function copyToClipboard(id) {
            // var text = $(this).attr('link');
            // console.log(text);
            var link = $("#client"+id).val()+'/'+id;
            alert("Copy Link:"+link);
             
    
  
}
function send_link(type, user)
{
    $('#sndSmsModal').modal('show');
            if(type == 'sms')
            {
                var mid = '#phone'+user;
            $('#cnum').attr('placeholder','Enter Phone Number');
            $('#cnum').val($(mid).text());
            }
            else
            {
                
                $('#cnum').attr('placeholder','Enter Email Address');
            }
            $('#rtype').val(type);
            $('#couponID').val(user);
}
function use_coupon(id)
{
    var data = {
    number: 'null',
    coupon: id,
    type: 'use'
  };
    $.post("<?= base_url();?>/api/send_coupon",
  data,
  function(data, status){
    var obj = JSON.parse(data);
    console.log(obj);
    if(obj.status)
    {
        swal("Good job!", obj.msg, "success");
        location.reload();

    }
    else
    {
        swal({
  title: "Sorry!",
  text: obj.msg,
  icon: "error",
});
}
});
}
    </script>
    <script type="text/javascript">
        var BASE_URL = "<?=(isset($url)?$url:base_url())?>";
        function show_loader(){
            var html = '<img src="<?= base_url('assets/front/img/load.gif'); ?>" style="width: 48px;margin-left: 204px;" />';
                $('.modal-body').html(html);
        }
        function import_form()
        {
            var fd = new FormData();    
            fd.append( 'file', $('#work_file')[0].files[0] );
        $.ajax({
            url: $("#products_import").attr('action'),  
            type: 'POST',
            data: fd,
            beforeSend: function() {
        show_loader();
    },
    success: function(data) {
        setTimeout(function(){ 
          modal_response(data);
          
      }, 3000);
    },
            cache: false,
            contentType: false,
            processData: false
        });
        }
        function submit_form(id)
        {
            var mid = "#"+id;
            var datastring = $(mid).serialize();
            
            $.ajax({
                type: $(mid).attr('method'),
                url: $(mid).attr('action'),
                data: datastring,
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    setTimeout(function(){ 
                      modal_response(data);
                      
                  }, 3000);
                },
                error: function() {
                }
            });
        }
        function modal_response(data)
        {
            var obj = JSON.parse(data);
            if(obj['html'])
            {
                $('.modal-body').html(obj['html']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
    function custom_modal(option)
    {
        
        
        if(true)
        {
            
            $('#modalBtn').click();
            var url = BASE_URL+'/api/'+option;
              $.ajax({
                url: url,
                data: {
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
    }
    function service_provider(oid)
    {
        
        
        var mid = '#provirder_'+oid;
        if($(mid).val() != ' ')
        {
            
            $('#modalBtn').click();
            var url = '<?= base_url(); ?>'+'/api/service_provider';
              $.ajax({
                url: url,
                data: {
                order_id: oid,
                action: $(mid).val()
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    $(mid).val('');
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
    }
    function product_option(oid)
    {
        
        
        var mid = '#product_'+oid;
        if($(mid).val() != ' ')
        {
            $('#modalBtn').click();
            var url = BASE_URL+'/api/product_option';
              $.ajax({
                url: url,
                data: {
                order_id: oid,
                action: $(mid).val()
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    $(mid).val('');
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
    }
    function order_modal(oid)
    {
        
        
        var mid = '#order_'+oid;
        if($(mid).val())
        {
            $('#modalBtn').click();
            var url = BASE_URL+'/api/order_modal';
              $.ajax({
                url: url,
                data: {
                order_id: oid,
                action: $(mid).val()
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    $(mid).val('');
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
    }
    function import_prcess(imp_id,i=1)
    {
        var url = BASE_URL+'/api/sing_import/'+i; 
              $.ajax({
                url: url,
                beforeSend: function() {
                    // show_loader();
                },
                success: function(data) {
                    var personObject = JSON.parse(data); //parse json string into JS object
                    if(personObject['per'] == 100)
                    {
                        $('.progress').html('Completed');
                    }
                    if(personObject['next'] && personObject['per'] < 100)
                    {
                        // alert(personObject['next']);
                        var px = personObject['per']+'%';
                        $('#imp_progress').css({'color':'black','width':px});
        $('#imp_progress').text(personObject['done']+' out of '+personObject['tot']+"processed");
        import_prcess(0,personObject['next']);
                    }
                    else if(personObject['per'] == 100 && personObject['html'])
                    {
                     $('.modal-body').html(personObject['html']);   
                    }
                },
                error: function() {
                    
                }
            });
    }
    function import_start(imp_id,n,t)
    {
        var html= '<div class="progress" style="height: 20px;">';
  html+='<div class="progress-bar" id="imp_progress" role="progressbar" aria-valuenow="70"';
  html+='aria-valuemin="0" aria-valuemax="100" style="width:0%;border-radius: 0px;background-color: #1af71a;">';
    html+='<span class="sr-only">70% Complete</span>';
  html+='</div>';
html+='</div>' ;
        $('#imup').html(html);
        
        $('#imp_progress').css({'color':'black','width':'0px'});
        $('#imp_progress').text('0 out of '+t+"processed");
        import_prcess(imp_id,n);
    }
    </script>

</body>
<!-- END: Body-->

</html>