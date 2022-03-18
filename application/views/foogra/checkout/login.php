<style>
    
</style>
<div class="panel" id="nxt-step">
                 
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 col-xl-8">
                                            <div class="accordion" id="accordion1">
                                                <div class="card card-panel bg-white shadow-sm mb-2" style="">
                                                    <div class="card-header py-4 bg-white collapsed" role="button" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        <h2 class="h4 mb-0">Guest</h2>
                                                    </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1" style="">
                                                    <div class="card-body p-0">
                                                        <hr class="m-0">
                                                   <div class="p-4 p-md-6">
                                   <form id="checkout_register" action="<?= base_url('api/register'); ?>" >
                    <input type="hidden" value="checkout" name="type" />
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="First name: *" name="first_name" ></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Last name: *" name="last_name"></div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Company name:" name="s"></div>
                                         </div>
                                         <div class="col-md-4">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Designation: *" name="designation"></div>
                                         </div>
                                         <div class="col-md-8">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="District: *" name="district"></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Email: *" name="email"></div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Phone: *" name="billing_phone"></div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Password: *" name="pass"></div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="customExampleCheck1"> <label class="custom-control-label" for="customExampleCheck1">I have read and accepted the <a href="#">terms and conditions</a></label></div>
                                            <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="customExampleCheck2"> <label class="custom-control-label" for="customExampleCheck2">Create an account(optional)</label></div>
                                         </div>
                                         <button class="btn btn-primary btn-rounded px-lg-5 nxt" onclick="submit_form('checkout_register');" type="button" style="float:right;">Create an account</button>
                                      </div>
                                   </form>
                                </div>
                                </div>
                                
                                </div></div>
                                <div class="card card-panel bg-white shadow-sm mb-2" style="margin-top:10px;background-color: white;">
                                   <div class="card-header py-4 collapsed bg-white" role="button" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                      <h2 class="h4 mb-0">Already member?</h2>
                                   </div>
                                   <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                      <div class="card-body p-0">
                                         <hr class="m-0">
                                         <div class="p-4 p-md-6">
                                            <form action="<?= base_url('/api/front_login'); ?>" id="checkout_login">
                      <input type="hidden" name="type" value="checkout" />
                                               <div class="row justify-content-center py-4">
                                                  <div class="col-md-12">
                                                     <div class="form-group"><input type="text" value="" class="form-control form-control-simple" placeholder="Email" name="uname" /></div>
                                                     <div class="form-group"><input type="password" value="" class="form-control form-control-simple" placeholder="Password" name="upass" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"></div>
                                                     <div class="custom-control custom-checkbox custom-checkbox-primary py-2"><input type="checkbox" class="custom-control-input" id="rememberCheck"> <label class="custom-control-label" for="rememberCheck">Remember me</label></div>
                                                     <button class="btn btn-darks btn-primary btn-rounded px-lg-5" onclick="submit_form('checkout_login');" type="button" style="float:right;">Sign in</button>
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
               