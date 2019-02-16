<?
$data = array (
    'add' => 
    array (
      0 => 
      array(
        'name'=>'Заявка из кастомной формы',
        'created_at'=>$_SERVER['REQUEST_TIME'],
        //'status_id'=>142,
        'sale'=>$_POST['budget'],
        //'responsible_user_id'=>3239164,
        'tags' => 'Заявка из формы', //Теги
        'contacts_id'=> array(
            0 => $contactId,
        ),
      ),
    ),
  );
  $link = "https://artsidaev.amocrm.ru/api/v2/leads";
  
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
  
  echo "Ваши данные отправлены успешно!";