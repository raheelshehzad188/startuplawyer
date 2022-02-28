
<style>
.sticky.main-menu ul a, .main-menu ul li a
{
    color: #000 !important;
}
.container_checkout{
    margin-top:126px;
}
    h4{
        background-color:#182E49;
        text-align:center;
        font-size:17px;
        color:#fff;
        height:25px;
        padding-top: 9px;
        padding-bottom: 34px;
    }
    p{
        font-size:15px;
    }
   label {
        font-size:13px!important;
}
input:placeholder{
    font-size:13px;
}
input[type=text]{
    height:40px;
}
    .container{
            padding: 10px 100px;
    }
    .btn-custom{
        background-color:#182E49;
        color:#fff;float: right;
         width: 40%;
        font-size: 13px;
    }
    .btn-custom:hover{
        color:#FFF;
    }
</style>
<body>
    <div class="container container_checkout">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required="">
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                 <h4 class="mb-3">Your Order</h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Sub Total</h6>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">GST</h6>
              </div>
              <span class="text-muted">$8</span>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
       <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Credit card</label>
                <img src="img_girl.jpg"  width="50" height="50">
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">PayHere</label>
                <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.payhere.lk%2Fimages%2Flogo_w.png&imgrefurl=https%3A%2F%2Fwww.payhere.lk%2F&tbnid=KpIZ75lxh7csuM&vet=12ahUKEwihtLrM-4_yAhVYMRoKHfEUDIMQMygEegUIARDRAQ..i&docid=wMW9jKVOQo2biM&w=1600&h=500&q=pay%20here&ved=2ahUKEwihtLrM-4_yAhVYMRoKHfEUDIMQMygEegUIARDRAQ"  width="50" height="50">

              </div>
              
            </div>
          
            <hr class="mb-4">
            <button class="btn btn-custom btn-lg btn-block" type="submit">Continue to checkout</button>
        </div>
            </div>
        </div>
    </div>
   