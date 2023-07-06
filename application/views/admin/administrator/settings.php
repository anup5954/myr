<?php
$api_key = '10le7xyl13u8owo00w84cwkgkkwccgsw8ckg00';
//$url = 'https://api.vreasy.com/reservations?status=ENQUIRY&expand=guest&fields=guest/fname,guest/lname,guest/email';
/*$url = 'https://api.vreasy.com/properties?status=ENQUIRY&expand=images';  */
$url='https://api.vreasy.com/properties?id=security_deposit_fee_information';
?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<?php
//$url='https://api.vreasy.com/reservations?status=ENQUIRY&expand=guest&fields=guest/fname,guest/lname,guest/email';
//$url='https://api.vreasy.com/properties?expand=images&fields=images,id';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":"); //Normally you'd put a password after the colon, but you don't need it if you're using an API key
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$response_json = json_decode($response, true);
echo '<pre>';
//print_r($response_json);
print_r($response_json);
//print_r($response_json[0]['featured_image']['url']);
//echo '<img src="'.$response_json[0]['featured_image']['url'].'" />';
$error = curl_error($ch);
//print_r($error);
curl_close($ch);
//exit;
?>
</div>
</div>
</div>



