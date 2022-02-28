
<style>
.table{
    width:80%;
    border:1px solid grey;
     margin-left: 8%;
         margin-top: 126px;
     TEXT-ALIGN:CEnter;
}
.table thead tr th,.btn-custom{
      text-transform: uppercase;
      background-color:#182E49;
      color:#ffffff;
}
.btn-custom{
    font-size:10px;
}
.btn-custom:hover, btn-custom:focus{
    color:#FFFFFF;
}
.form-group{
        width: 60%;

}
table, th, td {
  border: 1px solid grey;
  border-collapse: collapse;
}

</style>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
      <?php print_r($_SESSION['addcart']); ?>
    <tr>
      <th scope="row">
          <img src="img_girl.jpg"  width="500" heigh="600"> Product
     </th>
      <td>$50.0</td>
      <td>	<input type="number" name="qty" id="qty" min="1" max="100" step="1" value="1">
			
      <td>$50.0</td>
    </tr>
    <tr>
        <td> <form>
                        <div class="form-group">
                            <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code" style="background-color: #ffffff00;font-size: 14px;
                                border: 1px solid;">
                            <span class="input-group-append"> <button class="btn btn-custom btn-apply coupon">APPLY COUPON</button> </span> </div>
                        </div>
                    </form></td>
        <td></td>
        <td></td>
        <td><button class="btn-custom btn ">Update Cart</button></td>
    </tr>
  </tbody>
  <div class=row>
      <div class="col-md-6 col-sm-12">
          
<table class="table" style="width:30%; margin-left: 58%;">
  <thead>
    <tr>
          <th scope="row" colspan="2">Cart totals</th>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
           Sub Total:
           </th>
           <th scope="row">
           $180
           </th>
     
    </tr>
    <tr>
      <th scope="row">
           Total:
           </th>
           <th scope="row">
           $180
           </th>
     
    </tr>
    <tr>
        <td><button class="btn-custom btn">Proceed to checkout</button></td>
    </tr>
  </tbody>
      </div>
  </div>
  
  
  
  
  
  
  
  
  
  
</table>