<?
//АВТОРИЗАЦИЯ
$user=array(
  'USER_LOGIN'=>'cr-18@yandex.ru', //Ваш логин (электронная почта)
 'USER_HASH'=>'10c56ce69e01fc2142d30794a2c6b7e3769edf36' //Хэш для доступа к API (смотрите в профиле пользователя)
);
$subdomain='artsidaev'; //Наш аккаунт - поддомен

//Получаем и записываем данные из массива $_POST
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$company = $_POST['company'];
$position = $_POST['position'];

//Добавление сделки
$leads['add']=array(
  0=>
  array(
    'name'=>'заявка из кастомной формы',
    //'created_at'=>1298904164,
    //'status_id'=>142,
    'sale'=>300000,
    'responsible_user_id'=>215302,
    'tags' => 'Important, USA', //Теги
   'custom_fields'=>array()
  )
);

//Добавление контакта
$contacts['add']=array(
  0=>
  array(
     'name' => $name,
     'responsible_user_id' => 504141,
     'created_by' => 504141,
     //'created_at' => "1509051600",
     'tags' => "важный,доставка",
     'custom_fields' => array(
       0=>
        array(
           'id' => 366561,
           'values' => array(
             0=>
              array(
                 'value' => $position
              )
           )
        ),
        1=>
        array(
          'id' => 366565,
          'values' => array(
            0=>
             array(
                'value' => $email,
                'enum' => "WORK"
             )
          )
       ),
        2=>
        array(
          'id' => 366563,
          'values' => array(
            0=>
             array(
                'value' => $phone,
                'enum' => "WORK"
          )
       )              
     )
  )
)
);

//Формируем ссылку для запроса
$link_auth='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$link_leads='https://'.$subdomain.'.amocrm.ru/api/v2/leads';
$link_contacts='https://'.$subdomain.'.amocrm.ru/api/v2/contacts';
$link_account='https://'.$subdomain.'.amocrm.ru/api/v2/account?with=custom_fields';

/* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Вы также
можете
использовать и кроссплатформенную программу cURL, если вы не программируете на PHP. */
$curl=curl_init(); //Сохраняем дескриптор сеанса cURL
//Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link_auth);
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





/* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Подробнее о
работе с этой
библиотекой Вы можете прочитать в мануале. */
$curl=curl_init(); //Сохраняем дескриптор сеанса cURL
//Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link_leads);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out1=curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code1=curl_getinfo($curl,CURLINFO_HTTP_CODE);


$curl=curl_init(); //Сохраняем дескриптор сеанса cURL
//Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link_contacts);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out2=curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code2=curl_getinfo($curl,CURLINFO_HTTP_CODE);


$curl=curl_init(); //Сохраняем дескриптор сеанса cURL
//Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link_account);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); //PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out3=curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code3=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

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
