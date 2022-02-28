<div class="outgoing_msg">

  <div class="sent_msg">

  <p><?= nl2br($message->message) ?></p>

  <span class="time_date"> <?= date('g:i A',strtotime($message->created_at.' + 2 hours') ) ?>    |    <?= date('M d',strtotime($message->created_at) ) ?></span> </div>

</div>