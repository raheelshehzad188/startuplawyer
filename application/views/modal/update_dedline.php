<h4>Update Dedline</h4>
<form action="<?= base_url(); ?>/api/update_deadline" id="update_deadline" method="post">
    <input type="hidden" name="order_id" value="<?= $order_id; ?>" /> 
    <div class="modal-body">
        <label>Days: </label>
        <div class="form-group">
            <!-- <select class="form-control" name="days" id="basicSelect">
                <option value="0">Select Day</option>
                <option value="1">1 Day</option>
                <?php
                for($i = 2; $i<=30; $i++ )
                {
                 ?>
                 <option value="<?=$i?>"><?=$i?> Days</option>
                 <?php   
                }
                ?>
                
                
            </select> -->
            <input type="date" class="form-control" style="width: 100%;" name="days">
        </div>

        <label>Reseaon </label>
        <div class="form-group">
            <textarea class="form-control" name="reason" id="label-textarea" rows="3" placeholder="Explain reason"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="submit_form('update_deadline')" class="btn btn-primary waves-effect waves-light">submit</button>
    </div>
</form>