<?php

include_once ('simple_html_dom.php');

$url = 'https://rastenievod.com/dishidiya.html'; //нужно указывать точный адрес к странице!!!
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

$text_parts =[];

foreach ($html->find('.entry-content') as $full_text)
    foreach ($full_text->find('p') as $text) {
        $text_parts[] = [
            'detail' => $text->plaintext];
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
    <title>Растение</title>
</head>
<style>
    p{
        font-size: 20px;
        font-weight: lighter;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
    }
</style>
<body>
<h1 class="plant">Дисхидия</h1>
<?php
foreach ($text_parts as $key => $info){

    echo "<p>";
    echo $info['detail'];
    echo "</p>";

}
?>

<div class="homebtn" style="position: fixed; right: 0; bottom: 0;">
    <a href="main.php"><img src="icons8-домой-48.png" width="48px" height="48px"></a>
</div>
<div style="height: 50px;"></div>

</body>
</html>
