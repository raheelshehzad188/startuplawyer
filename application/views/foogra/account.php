        <style>
          .path {
            background-color: #f2f2f2;
            padding: 22px 90px
          }

          .account {
            padding: 30px 0px 0px 56px;
            display: flex;
          }

          .account p {
            padding: 14px;
          }

          .account img {
            height: 70px;
            width: 70px;
            border-radius: 25px;
          }

          .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
          }

          .content .list {
            display: flex;
            flex-direction: column;
            width: 20%;
            margin-right: 50px;
            position: relative;
          }

          .content .list label {
            border: 1px solid grey;
            padding: 10px;
            width: 220px;
            text-transform: uppercase;
          }

          .content .list label:hover {
            color: #6d50e2;
          }

          .title {
            font-size: 15px;
          }

          .cctabs {
            width: 25%;
          }

          .cctabs ul {
            list-style-type: none;
          }

          .cctabs ul li {
            padding: 11px 25px;
            border: 1px solid #ededed;
            margin: 3px 0;
            text-transform: uppercase;
            background-color: #F1F1F1;
            font-weight: 500;
          }

          .cctabs ul li a {
            color: #000;
          }

          .cctabs ul li:hover, .cctabs ul li:active, .cctabs ul li:focus{
            background-color: #ffdb58;
          }

          .panels {
            width: 75%;
            padding-left: 30px;
          }

          .wrapper {
            display: flex;
          }

          .dashboard a {
            color: #007bff;
          }
          table{
              width:100%;
          }
          tr{
              border-bottom: 1px solid #eae8e8;
          }
          td, th{
              padding:10px;
          }
          th{
              background-color:#eae8e8;
          }
          select{
              border:none;
          }
          @media only screen and (max-width: 768px) {
              /* For mobile phones: */
           .cctabs{
               width:100%;
               margin-top: -30px;
           }
           .wrapper{
               display:block;
           }
           .panels{
               width:100%;
               padding-left:0px;
           }
           .cctabs ul{
               display:flex;
              flex-wrap: wrap;
              align-items: center;
              padding:0;
           }
           .account {
               padding: 7px 0px 0px 15px;
            }
            td, th{
                padding:5px;
                font-size: 10px;
            }
            .cctabs ul li {
                padding: 15px 10px 0px 10px;
                font-size: 8px;
            }
            .account img {
                height: 50px;
                width: 50px;
            }
            .path{
                padding: 22px 0 22px 26px;
            }
        </style>
        <div class="path">Home/My Account</div>
        <div class="container">
          <div class="account">
            <img src="https://startuplawyer.lk/main/assets/front/img/user_random.png">
            <p> Hello! <br>
              <b>Nimra Younas</b>
            </p>
          </div>
          <div class="content"> <?php

      $tab = 'account';

      if(isset($_REQUEST['tab']))

      {

      	$tab = $_REQUEST['tab'];

      }

      $tabs = array();

      $tabs['dashboard']= array(

      'text' => 'Dashboard',

      'file' => 'dashboard',

      );

      $tabs['orders']= array(

      'text' => 'Orders',

      'file' => 'orders',

      );

      $tabs['downloads']= array(

      'text' => ' Downloads',

      'file' => 'downloads',

      );

      $tabs['messages']= array(

      'text' => ' Messages',

      'file' => 'messages',

      );

      $tabs['reviews']= array(

      'text' => '  reviews',

      'file' => 'reviews',

      );
      $tabs['billing']= array(

      'text' => 'Billing',

      'file' => 'billing',

      );
      $tabs['disputes']= array(

      'text' => 'Disputes',

      'file' => 'disputes',

      ); $tabs['account_detail']= array(

      'text' => '  Account Detail',

      'file' => 'account_detail',

      );

      ?> </div>
          <div class="container">
            <div class="wrapper">
              <div class="cctabs">
                <ul> <?php

                  foreach($tabs as $k=> $v)

                  {

                  	?> <li <?= ($k == $tab)?"active":""; ?>>
                    <a href="?tab=
									<?= $k ?>"> <?= $v['text'] ?> </a>
                  </li> <?php

                  }

                  ?> </ul>
              </div>
              <div class="panels">
                <div class="panel"> <?php

                  if(isset($tabs[$tab]))

                  {

                   $sing = $tabs[$tab];

                   if($sing['file'])

                   {

                  	$v = 'foogra/account/'.$sing['file'];

                  	$this->load->view($v);

                   }

                  }

                  ?> </div>
              </div>
            </div>
          </div>
        </div>