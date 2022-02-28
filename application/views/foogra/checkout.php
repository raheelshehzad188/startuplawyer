<style>

   a {
   color: #4f4d4d;
   text-decoration: none;
   }
   a:hover, a:focus {
   color: #000;
   }
   *, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
   a, button {
   outline: none;
   }
   .clearfix:before,
   .clearfix:after {
   content: " ";
   display: table;
   }
   .clearfix:after {
   clear: both;
   }
   /* To Navigation Style */
   .cctop {
   background:#08cbd2;	
   width: 100%;
   text-transform: uppercase;
   font-weight: 700;
   font-size: 0.75em;
   line-height: 3.2;
   }
   .cctop a {
   display: inline-block;
   padding: 0 1.5em;
   text-decoration: none;
   letter-spacing: 1px;
   }
   .cctop span.right {
   float: right;
   }
   .cctop span.right a {
   display: block;
   float: left;
   }
   /* Header Style */
   .ccheader {
   margin: 0 auto;
   padding: 2em;
   text-align: center;
   }
   .ccheader h1 {
   font-size: 2.625em;
   font-weight: 300;
   line-height: 1.3;
   margin: 0;
   }
   .ccheader h1 span {
   display: block;
   padding: 0 0 0.6em 0.1em;
   font-size: 60%;
   opacity: 0.7;
   }
   /* Demo Buttons Style */
   .codeconvey-demo {
   padding-top: 1em;
   font-size: 0.8em;
   }
   .codeconvey-demo a {
   display: inline-block;
   margin: 0.5em;
   padding: 0.7em 1.1em;
   outline: none;
   border: 2px solid #fff;
   color: #fff;
   text-decoration: none;
   text-transform: uppercase;
   letter-spacing: 1px;
   font-weight: 700;
   }
   .codeconvey-demo a:hover,
   .codeconvey-demo a.current-demo,
   .codeconvey-demo a.current-demo:hover {
   border-color: #333;
   color: #333;
   }
   /* Wrapper Style */
   .wrapper{
   }
   section{ float:left; width:100%;}
   .opt{ 
   background: url(../images/bg.jpg) repeat-x;
   padding:3%;
   }
   @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);
   @font-face {
   font-family: 'FontAwesome';
   src: url('../fonts/fontawesome-webfont.eot?v=4.0.3');
   src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
   font-weight: normal;
   font-style: normal;
   }
   .cctabs {
   width: 100%;
   margin: 100px auto;
   }
   .cctabs input[type="radio"] {
   opacity: 0;
   }
   #customRadio3, #customRadio2{
          opacity: 1;
   }
   .cctabs .fa{
   margin-right:10px;	
   }
   .cctabs label {
   color: #000;
   cursor: pointer;
   float: left;
   margin-right: 2px;
   padding: 0.5% 2%;
   font-size:16px;
   }
   .cctabs input:checked + label {
   background: #fff;
   color: #7521ff;
   }
   .cctabs input:nth-of-type(1):checked ~ .panels .panel:first-child, .cctabs input:nth-of-type(2):checked ~ .panels .panel:nth-child(2), .cctabs input:nth-of-type(3):checked ~ .panels .panel:nth-child(3),.cctabs input:nth-of-type(4):checked ~ .panels .panel:nth-child(4), .cctabs input:nth-of-type(5):checked ~ .panels .panel:last-child {
   opacity: 1;
   -webkit-transition: .3s;
   /*position:relative;*/
   z-index:999;
   }
   .cctabs .panels {
   float: left;
   clear: both;
   position: relative;
   width: 100%;
   background: #fff;
   }
   .cctabs .panel {
   width: 100%;
   opacity: 0;
   position: absolute;
   background: #fff;
   padding: 4%;
   box-sizing: border-box;
   }
   .cctabs .panel h2 {
   margin: 0;
   font-family: Arial;
   }
   .cctabs .panel i{
   color:#7521ff;
   cursor:pointer;	
   }
   .cctabs .panel i:hover{
   color:#f4cc42;
   }
   .cctabs .headline h1 {
   font-size: 30px;
   font-weight: bold;
   letter-spacing: 0.6px;
   padding-bottom: 0;
   text-align: center;
   text-rendering: optimizespeed;
   margin: 10px 0;
   }
   .cctabs .headline hr {
   background: none repeat scroll 0 0 #7521ff;
   border: 2px solid;
   color: #7521ff;
   margin-bottom: 0;
   margin-top: 0;
   width: 30px;
   }
   .cctabs .headline .lead {
   font-family: "Lato",sans-serif;
   font-weight: 300;
   line-height: 1.9;
   margin: 5px 0;
   text-align: center;
   }
   #map-canvas {
   height: 366px;
   width: 462px;
   }
   #cc-contact input[type="text"], 
   #cc-contact input[type="email"],
   #cc-contact input[type="tel"],
   #cc-contact input[type="password"],
   #cc-contact textarea{
   width:100%;
   border:1px solid #ebb704;
   margin:0 0 5px;
   padding:10px;
   font-family: "Lato",sans-serif;
   font-size:14px;
   }
   #cc-contact textarea {
   height:147px;
   max-width:100%;
   }
   #cc-contact button[type="submit"] {
   cursor:pointer;
   width:100%;
   border:none;
   background:#ebb704;
   color:#FFF;
   margin:0 0 5px;
   padding:10px;
   font-size:15px;
   }
   #cc-contact button[type="submit"]:hover {
   background:#f4cc42;
   -webkit-transition:background 0.3s ease-in-out;
   -moz-transition:background 0.3s ease-in-out;
   transition:background-color 0.3s ease-in-out;
   }
   /* GRID*/
   .grid {
   display: block;
   margin-left: -10px;
   }
   .cc-text-center{
   text-align:center;
   }
   .cc-mt-20{
   margin-top:50px;	
   }
   .unit-2,
   .unit-3,
   .unit-4 {
   float: left;
   border-left: 10px solid transparent;
   box-sizing: border-box;
   background-clip: padding-box;
   }
   .unit-1{
   width:100%;
   float:left;	
   }
   .unit-2 {
   width: 50%;
   }
   .unit-3 {
   width: 33.3%;
   }
   .unit-4 {
   width: 25%;
   }
   /*------here-----*/
   .card{
   box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
   padding: 25px;
   }
   .btn-darks{
          color: white;
    background-color: black;
    border-radius: 40px;
    padding: 15px 40px;
   }
   .nxt{
          color: white;
    background-color: #7521FF;
    border-radius: 40px;
    padding: 15px 40px;   
   }
   .tst{
       background-color: green;
    color: white;
    border-radius: 100%;
    text-align: center;
    padding: 15px 12px;
   }
   .box{
       border:1px solid #d2d8dd;
   }
   .dsn{
           padding: 0 192px;
   } 
   .lower h5{
       text-align: center;
    text-transform: uppercase;
    padding: 65px;
   }
   .reciept lable{
       text-transform: uppercase;
        color: #adadad;
   }
   .reciept input[type="text"],.reciept input[type="tel"], .reciept input[type="email"],.reciept input[type="number"],.reciept input[type="date"],.reciept input[type="time"]{
       border:none;
       width: 100%;
       background:none;
   }
   .reciept input:focus{
       outline:none;
   }
    .reciept .col-6{
        margin: 10px 0 10px 0;
    }
    .pay, .pay2, .pay3, .pay4{
        display:flex;
    }
    .pay2, .pay3, .pay4{
        padding:10px 45px 0 0;
    }
    #one, #two, #three, #four, #five{
        padding:09px;
    }
   @media only screen and (max-width: 600px) {/*---------for mob-------*/
       .dsn{
           padding:0;
       }
       .lower h4{
       text-align: center;
           
       }
        .pay, .pay2, .pay3, .pay4{
        display:block;
    }
    .pay2, .pay3, .pay4{
        padding:10px 0 0 0;
    }
   }


</style>
<body>
   <div class="container">
      <div class="wrapper">
         <div class="cctabs">
            <input checked id="one" name="tabs" type="radio">
            <label for="one"> Checkout</label>
            <input id="two" name="tabs" type="radio" value="Two">
            <label for="two">Login or Guest</label>
            <input id="three" name="tabs" type="radio">
            <label for="three"> Update Instructions</label>
            <input id="four" name="tabs" type="radio">
            <label for="four">Payment</label>
            <input id="five" name="tabs" type="radio">
            <label for="five"> Receipt</label>
            
            <div class="panels">
               <div class="panel">
                   <div class="dsn">
                  <P  style="text-transform: uppercase;">CARt ITEMS</P>
                  <div class="card">
                     <div class="row container">
                        <div class="col-md-8 col-sm-4">
                           <h5> Name of sp</h5>
                        </div>
                        <div class="col-md-8 col-sm-4">
                           <div class="action">
                                <span class="action-delete">
                                    <i class="feather icon-trash"></i>
                                </span> 
                                </div>
                        </div>
                     </div>
                     <div class="row align-items-center no-gutters p-md-2 container">
                        <div class="col-lg-2">
                           <img src="url()" alt="here " class="img-fluid">
                        </div>
                        <div class="col-lg-5 pl-lg-3 mb-2 mb-lg-0">
                           <h2 class="h5 mb-0">Name of Product</h2>
                           <span>Selected variations1,</span>
                           <span>Selected variations2,</span>
                           <span>Selected Ianguage,</span>
                        </div>
                        <div class="col-6 col-lg-2">
                           <input type="number" value="1" class="form-control">
                        </div>
                        <div class="col-6 col-lg-3 text-right">
                           <div class="h5 mb-0">$490,00</div>
                           <small class="text-muted">
                           <s>$877,00</s>
                           </small>
                        </div>
                     </div>
                  </div>
                  <div class="card" style="margin-top: 35px; ">
                     <div class="bg-white shadow-sm rounded mb-3 p-3">
                        <div class="row align-items-center no-gutters p-md-2">
                           <div class="col-lg-7">
                              <div class="py-2">
                                 <label>Promo code:</label> <br>
                                 <input type="text" value="" class="form-control form-control-sm w-auto" name="couponcode" id="couponcode" placeholder="Coupon code" style="width: auto;" >
                              </div>
                           </div>
                           <div class="col-lg-5">
                              <div class="row no-gutters">
                                 <div class="col-6"><b>Discount tax</b></div>
                                 <div class="col-6 text-right">$ 90,00</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card" style="margin-top: 35px; ">
                      <div class="bg-white shadow-sm rounded mb-2 p-3">
                          <div class="p-md-4">
                              <div class="row no-gutters">
                                  <div class="col-6">
                                      <div class="h4 mb-0">Total price</div>
                                  </div>
                                <div class="col-6 text-right">
                                    <div class="h4 mb-0">$ 490,00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="py-3" style="padding-top:35px;">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6">
                            <a href="#" class="btn btn-darks btn-primary btn-rounded px-lg-5">Shop more</a></div>
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-primary btn-rounded px-lg-5 nxt">Next step</a>
                            </div>
                        </div>
                  </div></div>
                    <div class="lower">
                        <h5>Who Trusts Startup lawyer?</h5>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="here"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Bar Association of sri lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="here"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Bar Association of sri lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><img src="here"></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12"><p><b>Bar Association of sri lanka</b></p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
               </div> 
               <div class="panel" id="nxt-step">
                 
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 col-xl-8">
                                            <div class="accordion" id="accordion1">
                                                <div class="card card-panel bg-white shadow-sm mb-2">
                                                    <div class="card-header py-4 bg-white collapsed" role="button" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        <h2 class="h4 mb-0">Register now</h2>
                                                    </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1" style="">
                                                    <div class="card-body p-0">
                                                        <hr class="m-0">
                                                   <div class="p-4 p-md-6">
                                   <form>
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="First name: *" ></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Last name: *"></div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Company name:"></div>
                                         </div>
                                         <div class="col-md-4">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Designation: *"></div>
                                         </div>
                                         <div class="col-md-8">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="District: *"></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Email: *"></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Phone: *"></div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="customExampleCheck1"> <label class="custom-control-label" for="customExampleCheck1">I have read and accepted the <a href="#">terms and conditions</a></label></div>
                                            <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="customExampleCheck2"> <label class="custom-control-label" for="customExampleCheck2">Subscribe to exciting newsletters and great tips</label></div>
                                         </div>
                                         <div class="col-md-12 text-right py-4"><a href="checkout-delivery.html" class="btn btn-primary">Create an account</a></div>
                                      </div>
                                   </form>
                                </div>
                                </div>
                                
                                </div></div>
                                <div class="card card-panel bg-white shadow-sm mb-2">
                                   <div class="card-header py-4 collapsed bg-white" role="button" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                      <h2 class="h4 mb-0">Already member?</h2>
                                   </div>
                                   <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                      <div class="card-body p-0">
                                         <hr class="m-0">
                                         <div class="p-4 p-md-6">
                                            <form>
                                               <div class="row justify-content-center py-4">
                                                  <div class="col-md-8">
                                                     <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Email"></div>
                                                     <div class="form-group"><input type="password" value="" class="form-control form-control-simple" placeholder="Password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"></div>
                                                     <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="rememberCheck"> <label class="custom-control-label" for="rememberCheck">Remember me</label></div>
                                                     <div class="text-right py-4"><a href="checkout-delivery.html" class="btn btn-dark">Sign in</a></div>
                                                  </div>
                                               </div>
                                            </form>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>                  
                           
                  <div class="lower">
                        <h5>Members only benefits</h5>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>1</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>2</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>3</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                  </div>
               <div class="panel">
                   <div class="container dsn">
                       <p style="text-transform: uppercase;">Specia instructions</p>
                       <div class="card">
                           <div><b>Full Name of sp></b></div>
                            <div class="row">
                                <div class= "col-lg-2 col-sm-2"><img src="" ></div>
                                <div class= "col-lg-6 col-sm-6">
                                    <p><b>Name of Product</b></p>
                                    <p>seIected variation1, seIected Ianguage</p>
                                </div>
                                <div class= "col-lg-4 col-sm-4 box"></div>
                                
                            </div>
                       </div>
                       <br><br>
                             <a href="#" class="btn btn-primary btn-rounded px-lg-5 nxt" style="float: right;">Next step</a>
                    </div>
                    <div class="lower">
                     <h5>WHAT OTHERS HAVE TO SAY?</h5>
                     <span><img src="" alt="img" ></span>
                     <span>NAME-</span>
                     <span>CITY</span>
                        <P>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</P>
                   </div>
               </div>
               <div class="panel">
                   <div class=" ">
   <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
                  <P  style="text-transform: uppercase;">Choose payment</P>
         <div class="accordion br-sm" id="accordionPaymentExample">
           <div class="card card-fill mb-3 shadow-sm rounded">
               <div class="card-header py-4 p-3 p-md-5">
                   <div class="row align-items-center">
                       <div class="col-12">
                           <div class="custom-control custom-radio d-flex align-items-center">
                               <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">
                               <label class="custom-control-label pl-2 pl-lg-4" for="customRadio2">
                                   <div class="h5 m-0">Payhere</div>
                                   <div>
                                       <img src="#">
                                       <img src="#">
                                       <img src="#">
                                   </div>
                                   <div class="pay">
                                       <div class="pay2">
                                          <span><img src="#"></span>
                                          <span><p><small>Central bank approved</small></p></span>
                                       </div>
                                       <div class="pay3">
                                          <span><img src="#"></span>
                                          <span><p><small>Bank-based security</small></p></span>
                                       </div>
                                       <div class="pay4">
                                          <span><img src="#"></span>
                                          <span><p><small>PCI DSS CompIiant</small></p></span>
                                       </div>
                                      </div>
                               </label>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-fill mb-3 shadow-sm rounded">
               <div class="card-header py-4 p-3 p-md-5">
                  <div class="row align-items-center">
                     <div class="col-9">
                        <div class="custom-control custom-radio d-flex align-items-center">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">
                        <label class="custom-control-label pl-2 pl-lg-4" for="customRadio3">
                            <span class="h5 m-0">Bank transfer</span>
                            <br>
                            <small class="d-none d-lg-inline-block">You can make payments directly into our bank account and email the bank wire transfer receipt to us. We recommend bank wire transfer for payments exceeding $500,00.</small></label>
                                <br>
                                
                            </div>
                            <div><select name="File" id="File">
                              <option value="File">Choose File</option>
                            </select></div>
                     </div>
                     <div class="col-3 text-right">
                        <div class="h1 m-0"><i class="fa fa-money"></i></div>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
          <div class="py-3" style="padding-top:35px;">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6">
                            <a href="#" class="btn btn-darks btn-primary btn-rounded px-lg-5">Instructions</a></div>
                            <div class="col-6 text-right">
                                <a href="checkout-login.html" class="btn btn-primary btn-rounded px-lg-5 nxt">Complete</a>
                            </div>
                        </div>
                  </div>
      </div>
   </div>

                  <div class="lower">
                        <h5>Why purchase through startup lawyer?</h5>
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>1</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>2</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>3</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    </div>
                    </div>
                    <div class="panel">
                        <div class="dsn">
                            <P  style="text-transform: uppercase;">Client info</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>Name</lable><br>
                                            <input type="text" id="" placeholder=" Nimra">
                                        </div>
                                        <div class="col-6">
                                            <lable>Company Name</lable><br>
                                            <input type="text" id="" placeholder="+1234567">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>whatsapp or mobile</lable><br>
                                            <input type="tel" id="" placeholder=" Nimra">
                                        </div>
                                        <div class="col-6">
                                            <lable>designation</lable><br>
                                            <input type="text" id="" placeholder="Divano Coorporation">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>email</lable><br>
                                            <input type="email" id="" placeholder="abc@hotmail.com">
                                        </div>
                                        <div class="col-6">
                                            
                                        </div>
                                    </div> <div class="row">
                                        <div class="col-6">
                                            <lable>address</lable><br>
                                            <input type="text" id="" placeholder="795 folsum">
                                        </div>
                                        <div class="col-6">
                                            <lable>district</lable><br>
                                            <input type="text" id="" placeholder="94107">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <P  style="text-transform: uppercase;">order details</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>order date</lable><br>
                                            <input type="date" id="" placeholder=" 5/5/2021">
                                        </div>
                                        <div class="col-6">
                                            <lable>total items</lable><br>
                                            <input type="number" id="" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>order number</lable><br>
                                            <input type="number" id="" placeholder=" 321a">
                                        </div>
                                        <div class="col-6">
                                            <lable>delivery dates</lable><br>
                                            <input type="date" id="" placeholder="6/8/2021">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <P  style="text-transform: uppercase;">payment details</P>
                            <div class="card reciept">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>transaction time</lable><br>
                                            <input type="time" id="" placeholder=" 509:55 pm">
                                        </div>
                                        <div class="col-6">
                                            <lable>amount</lable><br>
                                            <input type="number" id="" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable>transaction id</lable><br>
                                            <input type="number" id="" placeholder=" 321a">
                                        </div>
                                        <div class="col-6">
                                            <lable>cart details</lable><br>
                                            <input type="number" id="" placeholder="************123">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                              <div class="py-3" style="padding-top:35px;">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6">
                            <a href="#" class="btn btn-darks btn-primary btn-rounded px-lg-5">Older History</a></div>
                            <div class="col-6 text-right">
                                <a href="checkout-login.html" class="btn btn-primary btn-rounded px-lg-5 nxt">My Wishlist</a>
                            </div>
                        </div>
                  </div>
                        </div>
                             <div class="lower">
                        <h5>What to expect?</h5>
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>1</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>2</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div> <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-12"><h4>3</h4></div>
                                    <div class="col-lg-10 col-md-4 col-sm-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                        
                        
                    </div>
                </div>     

                </div>
                </div>
                </div>
   </body>
   
   
   
   
   
   
   
   
   
   
   
   
   
   