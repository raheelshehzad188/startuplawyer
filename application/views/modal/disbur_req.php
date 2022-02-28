<h4>Disbursement Requested</h4>
<form action="<?= base_url(); ?>/api/disbur_req" id="disbur_req" method="post">
    <div class="modal-body">
    <input type="hidden" name="order_id" value="<?= $order_id; ?>" /> 
        <label>Amount: </label>
        <div class="form-group">
            <input type="text" name="amount" class="form-control" id="basicInput" placeholder="Amount">
        </div>

        <label>Reseaon </label>
        <div class="form-group">
            <textarea class="form-control" name="reason" id="label-textarea" rows="3" placeholder="Label in Textarea"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="submit_form('disbur_req')" class="btn btn-primary waves-effect waves-light">submit</button>
    </div>
</form>