<?php
$uid = 0;
$orders = array();
if(isset($_SESSION['knet_login']))
{
    $uid = $_SESSION['knet_login']->ID;
    $modal->table ='orders';
    $orders = $modal->get(array('uid'=>$uid));
}
?>
<div class="panel">
   <div class="orders" style="overflow-x:auto;">
       
<table>
  <tr>
    <th></th>
    <th>ORDER</th>
    <th>DATE</th>
    <th>STATUS</th>
    <th>PRODUCT NAME</th>
    <th>SERVICE PROVIDER</th>
    <th>TOTAL</th>
    <th>ACTION</th>
  </tr>
  <?php
  foreach($orders as $k=> $v)
  {
      ?>
  <tr>
    <td style="color:red;">!</td>
    <td>#2121</td>
    <td>March 5,2022</td>
    <td>Processing</td>
    <td>product-name</td>
    <td>sp-name</td>
    <td>1000</td>
    <td>
<select>
  <option value="view" class="view" id="view">View</option>
  <option value="delete">Delete</option>
</select>
</td>
  </tr>
  <?php
  }
  ?>
 
</table>

   </div>
   <!---order_detail-->
   <!---order_detail-->
</div>
<style>
    .order-detail{
        padding-top:20px;
    }
    mark{
        background-color:yellow;
    }
</style>



















