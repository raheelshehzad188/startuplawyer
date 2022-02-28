<style type="text/css">
    /*---------chat window---------------*/
.container{
    max-width:900px;
}
.inbox_people {
  background: #fff;
  float: left;
  overflow: hidden;
  width: 30%;
  border-right: 1px solid #ddd;
}

.inbox_msg {
    border: 1px solid #ddd;
    clear: both;
    overflow: hidden;
    box-shadow: 0 2px 12px 0 rgba(199,194,194,0.28);
}

.top_spac {
  margin: 20px 0 0;
}

.recent_heading {
  float: left;
  width: 40%;
}

.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
  padding:
}

.headind_srch {
  padding: 10px 29px 10px 20px;
  overflow: hidden;
  border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
  color: #0465ac;
    font-size: 16px;
    margin: auto;
    line-height: 29px;
}

.srch_bar input {
  outline: none;
  border: 1px solid #cdcdcd;
  border-width: 0 0 1px 0;
  width: 80%;
  padding: 2px 0 4px 6px;
  background: none;
}

.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}

.srch_bar .input-group-addon {
  margin: 0 0 0 -27px;
}

.chat_ib h5 {
  font-size: 15px;
  color: #464646;
  margin: 0 0 8px 0;
}

.chat_ib h5 span {
  font-size: 13px;
  float: right;
}

.chat_ib p {
    font-size: 12px;
    color: #989898;
    margin: auto;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat_img {
  float: left;
  width: 11%;
}

.chat_img img {
  width: 100%
}

.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people {
  overflow: hidden;
  clear: both;
}

.chat_list {
  border-bottom: 1px solid #ddd;
  margin: 0;
  padding: 18px 16px 10px;
}

.inbox_chat {
  height: 550px;
  overflow-y: scroll;
}

.active_chat {
  background: #e8f6ff;
}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}

.incoming_msg_img img {
  width: 100%;
}

.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}

.received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 0 15px 15px 15px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}

.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}

.received_withd_msg {
  width: 57%;
}

.mesgs{
    float: left;
    padding: 30px 0px 0 0px;
    width: 95%;
    margin-left: 2%;
    margin-top: 5px;
}

.sent_msg p {
  background:#e51261;
  border-radius: 12px 15px 15px 0;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 5px 10px 5px 12px;
  width: 100%;
}

.outgoing_msg {
  overflow: hidden;
  margin: 26px 0 26px;
}

.sent_msg {
  float: right;
  width: 46%;
}

.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
  outline:none;
}

.type_msg {
  border-top: 1px solid #c4c4c4;
  position: relative;
}

.msg_send_btn {
    background: #e51261 none repeat scroll 0 0;
    border: none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 15px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 8px;
    width: 33px;
}

.messaging {
  padding: 0 0 50px 0;
  margin-top:50px;
}

.msg_history {
  height: 330px;
  overflow-y: auto;
}
  </style> 
<div class="messaging container">
  
  <div class="inbox_msg" >
  <div class="mesgs">
    <div class="msg_history" id="chat_id">
      <?php 
      $chat_id=0;
       ?> 
       <?php if (isset($chat)&&count($chat)>0): ?>
         <?php foreach ($chat as $message): ?>
         <?php 
         $chat_id=$message['chatID'];
          ?> 
         <?php if ($message['sender_id']==$user->UserID): ?>
          <div class="outgoing_msg">

        <div class="sent_msg">

         <p><?= nl2br($message['message']) ?></p>

  <span class="time_date"> <?= date('g:i A',strtotime($message['mcreated_at'] .' + 2 hours') ) ?>    |    <?= date('M d',strtotime($message['mcreated_at']) ) ?></span>  </div>

        </div> 
           <?php else: ?> 
           <div class="incoming_msg">

              <div class="incoming_msg_img"><?= $message['first_name'].' '.$message['last_name'] ?></div>

              <div class="received_msg">

              <div class="received_withd_msg">

                <p><?= nl2br($message['message']) ?></p>

                <span class="time_date"> <?= date('g:i A',strtotime($message['mcreated_at'] .' + 2 hours')) ?>    |     <?= date('M d',strtotime($message['mcreated_at']) ) ?></span></div>

              </div>

              </div> 
           <?php endif ?>  
         <?php endforeach ?>
       <?php endif ?>
        

        
    </div>
    <div class="type_msg">
    <input type="hidden" value="<?= isset($borrow_info)?$borrow_info->barrowID:'' ?>" name="borrow">
    <input type="hidden" value="<?= isset($chat)?$chat->chatID:'' ?>" name="chat_id">   
    <div class="input_msg_write">
      <input type="text" class="write_msg" placeholder="Type a message" name="message" onkeyup="sendMessage(event, this)" />
      <button class="msg_send_btn" type="button" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </div>  
    
    </div>
  </div>
  </div>
</div>
