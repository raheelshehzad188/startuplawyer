<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.googleapis.com/calendar/v3/calendars/en.pk%2523holiday%2540group.v.calendar.google.com/events?key=AIzaSyAa8yy0GdcGPHdtD083HiGGx_S0vMPScDM',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ya29.a0ARrdaM-Vbpm_skCTwScVBwUMCe2uBNQV5Xv1746qZZ4jSOq-aYDZDCv1qS54qNu97ywDbje8gur_u7B29BLgxmWAgAEgcTuRJtlAcUELuN6S-UullVu5QcDOhOQrDIFQ7L-Hg9uERixDR4Yp12mncVEH6St587NZn2T91N4',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>