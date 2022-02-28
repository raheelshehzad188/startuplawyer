<h4>|Select File</h4>
<form action="<?= base_url(); ?>/api/products_import" id="products_import" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
        <div class="form-group">
        	<label for="basicInputFile">CSV File</label>
            <input type="file" class="form-control" name="file" id="work_file">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="import_form()" class="btn btn-primary waves-effect waves-light">submit</button>
    </div>
</form>