<?
$data = array (
  'add' => 
  array (
    0 => 
    array(
       'name' => $_POST['name'],
       'responsible_user_id' => 504141,
       //'created_at' => "1509051600",
       'tags' => "важный,доставка",
       'company_name' => $_POST['company'],
       'custom_fields' => array(
         0=>
          array(
             'id' => 366561,
             'values' => array(
               0=>
                array(
                   'value' => $_POST['position']
                ),
            ),
          ),
          1=>
          array(
            'id' => 366565,
            'values' => array(
              0=>
               array(
                  'value' => $_POST['email'],
                  'enum' => "WORK"
               ),
            ),
         ),
          2=>
          array(
            'id' => 366563,
            'values' => array(
              0=>
               array(
                  'value' => $_POST['phone'],
                  'enum' => "WORK"
               ),
            ),              
        ),
    ),
),
),
);
$link = "https://artsidaev.amocrm.ru/api/v2/contacts";

$headers[] = "Accept: application/json";

 //Curl options
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__)."/cookie.txt");
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__)."/cookie.txt");
$out = curl_exec($curl);
curl_close($curl);
$result = json_decode($out,TRUE);
$contactId = $result['_embedded']['items'][0]['id'];
require('lead.php');
