<?php
$logo = ot_get_option( 'main_logo', $default );
?>
<div class="clearfix">
      <div class="left_box">
         <h3>Startup Lawyer Details</h3>
         <p><?php echo ot_get_option( 'contact_address', '91-C, Fultono street, Lower Mahattan located in the finacial district.' ); ?> </p>
         <ul>
            <li><b>Vat:</b><?php echo ot_get_option('vat_no', '234553333333' ); ?>  </li>
            <li><b>Tel:</b><?php echo ot_get_option( 'contact_phone', '233222222' ); ?>  </li>
            <li><b>Fax:</b><?php echo ot_get_option( 'fax_no', '56523456544' ); ?>  </li>
         </ul>
      </div>
      <div class="right_logo">
        <img src="<?= $logo ?>">
      </div>
   </div>