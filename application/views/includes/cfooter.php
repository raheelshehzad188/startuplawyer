<!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->
    


    <!-- BEGIN: Vendor JS-->
    <script src="<?= $assets ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= $assets ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= $assets ?>app-assets/js/core/app.js"></script>
    <script src="<?= $assets ?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= $assets ?>app-assets/js/scripts/pages/app-chat.js"></script>
    <!-- END: Page JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= $assets?>app-assets/js/scripts/components.js"></script>
                    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '.editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                        ClassicEditor
                                .create( document.querySelector( '.long_discription' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
<?php
    if(isset($js))
    {
        foreach ($js as $key => $value) {
            ?>
           
            <script src="<?= $value; ?>"></script>
            <?php
        }    
        
    }
    ?>
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
    <script type="text/javascript">
        var BASE_URL = "<?=(isset($url)?$url:base_url())?>";
        function show_loader(){
            var html = '<img src="<?= site_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin-left: 204px;" />';
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
            console.log(datastring);
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
        alert($(mid).attr('action'));
        alert($(mid).attr('method'));
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
    </script>

</body>
<!-- END: Body-->

</html>