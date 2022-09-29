<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5354193975:AAGrTKZXlxADB8tI7XGfDCPIcEyzzTYPYAc";

//Сюда вставляем chat_id
$chat_id = "1353065887";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $nickname = ($_POST['nickname']);
    $phone = ($_POST['phone']);
	$email = ($_POST['email']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $nickname,
        'Телефон:' => $phone,
		'Имя:' => $nickname
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: success.html');
} else {
  echo "Error";
}

?>