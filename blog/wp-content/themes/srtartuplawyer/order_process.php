<?php

function order_process($order_id){
    // https://startuplawyer.strokedev.net/panel/api/order_process/7551
    if(get_post_meta($order_id,'startuplawyer_order_process',true))
    {
        return true;
    }
    $url = panel_url().'/api/order_process/'.$order_id;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=6cba110d18be25bc05ed6f33a78b6e15'
  ),
));

$response = curl_exec($curl);
update_post_meta($order_id,'startuplawyer_order_process',$response);
curl_close($curl);
 return $response;
}
?>