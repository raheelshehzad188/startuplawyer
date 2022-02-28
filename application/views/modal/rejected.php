<h4>Order Decline</h4>
<form action="<?= base_url(); ?>/api/order_modal?action=reject_form" id="reject_form" method="post">
    <input type="hidden" name="order_id" value="<?= $order_id; ?>" />

        <label>Reseaon </label>
        <div class="form-group">
            <textarea class="form-control" name="reason" id="label-textarea" rows="3" placeholder="Explain reason"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="submit_form('reject_form')" class="btn btn-primary waves-effect waves-light">submit</button>
    </div>
</form>