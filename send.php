<?
//Массив с параметрами, которые нужно передать методом POST к API системы
$user=array(
    'USER_LOGIN'=>'cr-18@yandex.ru', //Ваш логин (электронная почта)
   'USER_HASH'=>'10c56ce69e01fc2142d30794a2c6b7e3769edf36' //Хэш для доступа к API (смотрите в профиле пользователя)
);
$subdomain='artsidaev'; //Наш аккаунт - поддомен
//Формируем ссылку для запроса
  $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
  /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Вы также
  можете
  использовать и кроссплатформенную программу cURL, если вы не программируете на PHP. */
  $curl=curl_init(); //Сохраняем дескриптор сеанса cURL
  //Устанавливаем необходимые опции для сеанса cURL
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
  curl_setopt($curl,CURLOPT_URL,$link);
  curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
  curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
  curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
  curl_setopt($curl,CURLOPT_HEADER,false);
  curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
  curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
  $out=curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
  $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); //Получим HTTP-код ответа сервера
  curl_close($curl); //Завершаем сеанс cURL
  /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
  $code=(int)$code;
  $errors=array(
    301=>'Moved permanently',
    400=>'Bad request',
    401=>'Unauthorized',
    403=>'Forbidden',
    404=>'Not found',
    500=>'Internal server error',
    502=>'Bad gateway',
    503=>'Service unavailable'
  );
  try
  {
    //Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
   if($code!=200 && $code!=204)
      throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
  }
  catch(Exception $E)
  {
    die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
  }
  /*
   Данные получаем в формате JSON, поэтому, для получения читаемых данных,
   нам придётся перевести ответ в формат, понятный PHP
   */
  $Response=json_decode($out,true);
  $Response=$Response['response'];
  if(isset($Response['auth'])) //Флаг авторизации доступен в свойстве "auth"
   return 'Авторизация прошла успешно';
return 'Авторизация не удалась';



$contacts = array (
    'add' => 
    array (
      0 => 
      array (
        'name' => $_POST['name'],
       'custom_fields' => 
        array (
          0 => 
          array (
            'values' => 
            array (
              0 => 
              array (
                'value' => $_POST['phone'],
                'enum' => 'MOB',
              ),
            ),
          ),
          1 => 
          array (
            'values' => 
            array (
              0 => 
              array (
                'value' => $_POST['email'],
                'enum' => 'PRIV',
              ),
            ),
          ),
        ),
      ),
    ),
  );
 //echo '<pre>'; print_r($Response); echo '</pre>';
 /* Теперь подготовим данные, необходимые для запроса к серверу */
 $subdomain='artsidaev'; #Наш аккаунт - поддомен
 #Формируем ссылку для запроса
 $link='https://'.$subdomain.'.amocrm.ru/api/v2/contacts';
 /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Подробнее о
 работе с этой
 библиотекой Вы можете прочитать в мануале. */
 $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
 #Устанавливаем необходимые опции для сеанса cURL
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
 curl_setopt($curl,CURLOPT_URL,$link);
 curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
 curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
 curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
 curl_setopt($curl,CURLOPT_HEADER,false);
 curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
 curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
 curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
 curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
 $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
 /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
 $code=(int)$code;
 $errors=array(
   301=>'Moved permanently',
   400=>'Bad request',
   401=>'Unauthorized',
   403=>'Forbidden',
   404=>'Not found',
   500=>'Internal server error',
   502=>'Bad gateway',
   503=>'Service unavailable'
 );
 try
 {
   #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
  if($code!=200 && $code!=204) {
     throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
   }
 }
 catch(Exception $E)
 {
   die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
 }
 /*
  Данные получаем в формате JSON, поэтому, для получения читаемых данных,
  нам придётся перевести ответ в формат, понятный PHP
  */
 $Response=json_decode($out,true);
 $Response=$Response['_embedded']['items'];
 $output='ID добавленных контактов:'.PHP_EOL;
 foreach($Response as $v)
  if(is_array($v))
    $output.=$v['id'].PHP_EOL;
return $output;

$leads = array (
    'add' => 
    array (
      0 => 
      array (
        'name' => $_POST['name'],
        'contacts_id' => 
        array (
          0 => $_POST['phone'],
          1 => $_POST['email'],
        ),
      ),
    ),
  );
  /* Теперь подготовим данные, необходимые для запроса к серверу */
  $subdomain='artsidaev'; #Наш аккаунт - поддомен
  #Формируем ссылку для запроса
  $link='https://'.$subdomain.'.amocrm.ru/api/v2/leads';
  /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Подробнее о
  работе с этой
  библиотекой Вы можете прочитать в мануале. */
  $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
  #Устанавливаем необходимые опции для сеанса cURL
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
  curl_setopt($curl,CURLOPT_URL,$link);
  curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
  curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
  curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
  curl_setopt($curl,CURLOPT_HEADER,false);
  curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
  curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
  $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
  $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
  /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
  $code=(int)$code;
  $errors=array(
    301=>'Moved permanently',
    400=>'Bad request',
    401=>'Unauthorized',
    403=>'Forbidden',
    404=>'Not found',
    500=>'Internal server error',
    502=>'Bad gateway',
    503=>'Service unavailable'
  );
  try
  {
    #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
   if($code!=200 && $code!=204) {
      throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
    }
  }
  catch(Exception $E)
  {
    die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
  }

