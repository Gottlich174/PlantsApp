<?php

include_once ('C:\ПроектМобилка\PlantsApp-main\PlantsAndZombies\simple_html_dom.php');

$url = 'https://rastenievod.com/category/komnatnye-rasteniya/ampelnye-rasteniya'; //нужно указывать точный адрес к странице!!!
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

foreach ($html->find('.category-ampelnye-rasteniya') AS $post){

    $img = $post->find('.wp-post-image',0 ); //путь к картинке
    $title = $post->find('a', 0); //заголовок
    $description = $post->find('.ft-excerpt', 0); //описание

    $posts[]=[
        'img_src' => $img->src,
        'title' => $title->title,
        'description' => $description->plaintext,
    ];
}
