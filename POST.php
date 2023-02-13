<?php

$json = [];




if ($_POST['password'] != $_POST['confirm_password']) {
    $json['error'] = "Пароль не совпадают";
}

if (!$_POST['confirm_password']) {
    $json['error'] = "Подтвердите пароль";
}

if (!$_POST['password']) {
    $json['error'] = "Заполните пароль";
}


if (!$_POST['email'] || stripos($_POST['email'], "@") === false) {
    $json['error'] = "Не корректная почта";
}

if (!$_POST['sirname']) {
    $json['error'] = "Заполните фамилию";
}


if (!$_POST['name']) {

    $json['error'] = "Заполните имя";
}









if (!$json) {

    $data = file_get_contents("users.json");
    $data = json_decode($data, true);
    if ($data) {
        $email = $_POST['email'];
        $emails = array_column($data, "email");
        if (in_array($email, $emails)) {



            file_put_contents("logs.log", date("Y-m-d H:i:s") . " Почта $email найдено совпадение \n", FILE_APPEND);
        } else {
            $json['error'] = "Почта $email не найдено совпадение";
            file_put_contents("logs.log", date("Y-m-d H:i:s") . " Почта $email не найдено совпадение \n", FILE_APPEND);
        }
    }
}



echo json_encode($json, true);
