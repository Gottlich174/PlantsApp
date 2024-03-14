<?php

include_once ('simple_html_dom.php');

//Параметры подключения к исходной странице

$url = 'https://rastenievod.com/category/komnatnye-rasteniya/page/2'; //нужно указывать точный адрес к странице!!!
function curlGetPage($url, $referer ='https://www.google.ru/'){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT,
                     'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;

}

//Выгрузка данных с исходной страницы
$page = curlGetPage($url);
$html = str_get_html($page);

$posts = [];

foreach ($html->find('.type-post') AS $post){
    $img = $post->find('.wp-post-image',0 ); //путь к картинке
    $title = $post->find('a', 0); //заголовок
    $description = $post->find('.ft-excerpt', 0); //описание

    $posts[]=[
        'img_src' => $img->src,
        'title' => $title->title,
        'description' => $description->plaintext,
    ];
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Справочник "Комнатные растения"</title>
</head>
<body>

<div class="menu">
    <input type="checkbox" id="burger-checkbox" class="burger-checkbox">
    <label for="burger-checkbox" class="burger"></label>
    <ul class="menu-list">
        <li><a href="#" class="menu-item">Все растения</a><li>
        <li><a href="#" class="menu-item">Ампельные растения</a><li>
        <li><a href="#" class="menu-item">Бонсай</a><li>
        <li><a href="#" class="menu-item">Бромелиевые</a><li>
        <li><a href="#" class="menu-item">Декоративно-лиственные</a><li>
        <li><a href="#" class="menu-item">Деревья и Кустарники</a><li>
        <li><a href="#" class="menu-item">Кактусы</a><li>
        <li><a href="#" class="menu-item">Луковичные</a><li>
        <li><a href="#" class="menu-item">Орхидеи</a><li>
        <li><a href="#" class="menu-item">Пальмы</a><li>
        <li><a href="#" class="menu-item">Папоротники</a><li>
        <li><a href="#" class="menu-item">Плодовый сад в квартире</a><li>
        <li><a href="#" class="menu-item">Суккуленты</a><li>
        <li><a href="#" class="menu-item">Хищные</a><li>
        <li><a href="#" class="menu-item">Цветущие</a><li>
    </ul>
</div>
<div style="font-size: 130%; position: absolute; top: 1%; right: 1%; color: black;"><b>Справочник "Комнатные растения"</b></div>

<div class="plant_cards">
    <?php
    //обход элементов массива и вывод информации в карточку растения
    foreach ($posts as $number => $info){

        echo ("<br>");
        echo('<div class="card">
        <text style="text-align: center;"><img width="293" height="155" src="');
        echo $info['img_src'];
        echo('"></text><h1>');
        echo $info['title'];
        echo ("</h1><span>");
        echo $info['description'];
        echo ("</span></div></div>");
    }
    ?>
</div>
</body>
</html>