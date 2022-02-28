<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myfathoorahv1 {
    private $url = 'https://apidemo.myfatoorah.com';
    private $username='apiaccount@myfatoorah.com';
    private $password='api12345*';
    private $token='';
    private $result='';
    public function set_type($type)
    {
      if($type == 'live')
      {
        $ci =& get_instance();
        $this->url= $ci->config->item( 'Knet_url' ); 
        $this->username= $ci->config->item( 'Knet_url' ); 
        $this->username= $ci->config->item( 'Knet_username' ); 
        $this->password= $ci->config->item( 'Knet_password' );
      }
    }
    public function genrate_token()
    {

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL,$this->url.'/Token');
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $this->username,'password' =>$this->password)));
      $result = curl_exec($curl);
      $info = curl_getinfo($curl);
      curl_close($curl);
      $json = json_decode($result, true);
      if(isset($json['access_token']) && !empty($json['access_token'])){
          $access_token= $json['access_token'];
      }else{
        $access_token='';
      }
      if(isset($json['token_type']) && !empty($json['token_type'])){
      $token_type= $json['token_type'];
        }else{
            $token_type='';
        }
     return $this->token =  $access_token;
}
    function genrate_link( $post_string){
      $this->token = $this->genrate_token();
          $soap_do     = curl_init();
       curl_setopt($soap_do, CURLOPT_URL, $this->url."/ApiInvoices/CreateInvoiceIso");
       curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
       curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
       curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($soap_do, CURLOPT_POST, true);
       curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
       curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Content-Length: ' . strlen($post_string),  'Accept: application/json','Authorization: Bearer '.$this->token));
       $result1 = curl_exec($soap_do);
      // echo "<pre>";var_dump($result1);die;
       $err    = curl_error($soap_do);
      return $this->result = $json1= json_decode($result1,true);
        }
        public function confirmation($id)
        {
          $this->token = $this->genrate_token();
          $url = $this->url.'/ApiInvoices/Transaction/'.$id;
        $soap_do1 = curl_init();
        curl_setopt($soap_do1, CURLOPT_URL,$url );
        curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
        curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($soap_do1, CURLOPT_POST, false );
        curl_setopt($soap_do1, CURLOPT_POST, 0);
        curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
        curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json','Authorization: Bearer '.$this->token));
        $result_in = curl_exec($soap_do1);
        return json_decode($result_in,true);

        $err_in = curl_error($soap_do1);
        $file_contents = htmlspecialchars(curl_exec($soap_do1));
        curl_close($soap_do1);
        return json_decode($result_in, true);
        echo'<div class="form-group "><label class="control-label" for="name">
        Invoice id : '.$getRecorById['InvoiceId'].'
         </label><br>';
         echo'<div class="form-group "><label class="control-label" for="name">
         InvoiceReference : '.$getRecorById['InvoiceReference'].'
          </label><br>';
        echo'<div class="form-group "><label class="control-label" for="name">
          CreatedDate : '.$getRecorById['CreatedDate'].'
           </label><br>';
        echo'<div class="form-group "><label class="control-label" for="name">
             ExpireDate : '.$getRecorById['ExpireDate'].'
              </label><br>';
      echo'<div class="form-group "><label class="control-label" for="name">
                   InvoiceValue : '.$getRecorById['InvoiceValue'].'
                    </label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  Comments : '.$getRecorById['Comments'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  CustomerName : '.$getRecorById['CustomerName'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  CustomerMobile : '.$getRecorById['CustomerMobile'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  CustomerEmail : '.$getRecorById['CustomerEmail'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TransactionDate : '.$getRecorById['TransactionDate'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TransactionDate : '.$getRecorById['TransactionDate'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  PaymentGateway : '.$getRecorById['PaymentGateway'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  ReferenceId : '.$getRecorById['ReferenceId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TrackId : '.$getRecorById['TrackId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TransactionId : '.$getRecorById['TransactionId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  PaymentId : '.$getRecorById['PaymentId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  AuthorizationId : '.$getRecorById['AuthorizationId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  OrderId : '.$getRecorById['OrderId'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TransactionStatus : '.$getRecorById['TransactionStatus'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  Error : '.$getRecorById['Error'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  PaidCurrency : '.$getRecorById['PaidCurrency'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  PaidCurrencyValue : '.$getRecorById['PaidCurrencyValue'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  TransationValue : '.$getRecorById['TransationValue'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  CustomerServiceCharge : '.$getRecorById['CustomerServiceCharge'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  DueValue : '.$getRecorById['DueValue'].'</label><br>';
  echo'<div class="form-group "><label class="control-label" for="name">
  Currency : '.$getRecorById['Currency'].'</label><br>';
        }
        public function get_single($name)
        {
          foreach ($this->result['PaymentMethods'] as $key => $value) {
            if($value['PaymentMethodCode'] == $name)
              return $value['PaymentMethodUrl'];
          }
        }
}