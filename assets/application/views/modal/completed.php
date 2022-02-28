<h4>Deliver Now</h4>
<form action="<?= base_url(); ?>/api/complete" id="complete" method="post">
    <input type="hidden" name="order_id" value="<?= $order_id; ?>" /> 
    <div class="modal-body">
        <div class="form-group">
        	<label for="basicInputFile">Work File Url</label>
            <input type="text" class="form-control" name="file" id="work_file">
        </div>

        <label>Explaination</label>
        <div class="form-group">
            <textarea class="form-control" name="reason" id="label-textarea" rows="3" placeholder="Explain reason"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="submit_form('complete')" class="btn btn-primary waves-effect waves-light">submit</button>
    </div>
</form>