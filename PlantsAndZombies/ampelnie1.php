<?php

include_once ('simple_html_dom.php');

//Соответствия для href в post'ах
$links = array(
        "Дисхидия" =>"dishidiya.php",
    "Анредера"=>"andredera.php",
    "Микания" =>"mikaniya.php",
    "Неоальсомитра"=>"neoalsomitra.php",
    "Базелла"=>"bazella.php",
    "Кодонанта"=>"kodonanta.php",
    "КрестовникРоули"=>"krestovnikrowly.php",
    "Ампельнаяпеларгония"=>"pelargoniya.php",
    "Толмия"=>"tolmiya.php",
    "Комнатнаякамнеломка"=>"kamnelomka.php",
    "Стефанотис"=>"stefanotic.php",
    "Фикускарликовый"=>"fikuskarlik.php",
    "Пеллиония"=>"pellionia.php",
    "Глориоза"=>"glorioza.php",
    "Плющ"=>"plush.php",
    "Роициссус"=>"roucussys.php",
    "Сеткреазияпурпурная"=>"setreaziapurpurnai.php",
    "Стронгилодон"=>"strongulodon.php",
    "Акалифа"=>"akalifa.php",
    "Каллизия"=>"kallizia.php",
    "Хедера(Плющкомнатный)"=>"xedera.php",
    "Эпипремнум"=>"epipremnum.php",
    "Фатсхедера"=>"fatsxedera.php",
    "Гинура"=>"gunyra.php",
    "Сингониум"=>"sungoniym.php",
    "Рипсалис"=>"ripsalis.php",
    "Дипладения(Мандевилла)"=>"mandevilla.php",
    "Клеродендрум"=>"klerodendrym.php",
    "Дихондра"=>"dixongra.php",
    "Бакопа"=>"bakopa.php",
    "Альсобия"=>"alsobia.php",
    "Традесканция"=>"tradeskacia.php",
    "Пеперомия"=>"peperomia.php",
    "Пилея"=>"pilea.php",
    "Колумнея"=>"kolymnea.php",
    "Монстера"=>"monstera.php",
    "Сциндапсус"=>"scindapsus.php",
    "Эсхинантус"=>"eshinantus.php",
    "Тетрастигма"=>"tetrastigma.php",
    "Циссус"=>"cissus.php",
    "Церопегия"=>"ceropegiya.php",
    "Эписция"=>"episciya.php",
    "Филодендрон"=>"filodendron.php",
    "Фуксия"=>"fuksiya.php",
    "Абутилон(комнатныйклен)"=>"abutilon.php",
    "Хойя(Восковойплющ)"=>"hoiya.php",
    "Зебрина"=>"zebrina.php",
    "Лапагерия"=>"lapageriya.php",
    "ФикусПанда"=>"fikuspanda.php",
    "Портулакария"=>"portulakariya.php",
    "Подокарпус"=>"podokarpus.php",
    "Лептоспермум"=>"leptospermum.php",
    "Жакаранда"=>"jakaranda.php",
    "Фикусмикрокарпа"=>"fikusmikrokarpa.php",
    "Фикуссвященный"=>"fikussaint.php",
    "Серисса"=>"serissa.php",
    "Тамаринд"=>"tamarind.php",
    "Брахихитон"=>"brahihiton.php",
    "Полисциас"=>"poliscias.php",
    "Криптомерияяпонская"=>"kriptomeriya.php",
    "Мирт(миртовое дерево)"=>"mirt.php",
    "Акантостахис"=>"akantostahis.php",
    "Неорегелия"=>"neoregeliya.php",
    "Комнатныйананас"=>"ananas.php",
    "Вриезия"=>"vrizeniya.php",
    "Тилландсия"=>"tillandsiya.php",
    "Криптантус"=>"kriptantus.php",
    "Нидуляриум"=>"nidulyarium.php",
    "Бильбергия"=>"bilbergiya.php",
    "Эхмея"=>"ehmeya.php",
    "Бромелия"=>"bromeliya.php",
    "Гузмания"=>"guzmaniya.php",
    "Эпифиллюм"=>"epifillyum.php",
    "Кактусы"=>"kaktus.php",
    "Эспостоа"=>"espostoaa.php",
    "Нотокактус"=>"notokaktus.php",
    "Лемэроцереус"=>"lemerocereus.php",
    "Селеницереус—царица ночи"=>"carica.php",
    "Клейстокактус"=>"kleystokaktus.php",
    "Кактуслофофора"=>"kaktuslofofora.php",
    "Кактуспародия"=>"kaktusparodiya.php",
    "Лобивия"=>"lobiviya.php",
    "Апорокактус"=>"aporokaktus.php",
    "Эхиноцереус"=>"ehinocereus.php",
    "Кактусцереус"=>"kaktuscerius.php",
    "Ферокактус"=>"ferokaktus.php",
    "Рипсалидопсис"=>"ripsalidopsis.php",
    "Переския"=>"pereskiya.php",
    "Астрофитум"=>"astrofitum.php",
    "Эпифиллум"=>"epifillum.php",
    "Опунция"=>"opunciya.php",
    "Гилоцереус"=>"gilocereus.php",
    "Ребуция"=>"rebuciya.php",
    "Гимнокалициум"=>"gimnokalicium.php",
    "Эхинокактус"=>"ehinokaktus.php",
    "Эхинопсис"=>"ehinopsis.php",
    "Хатиора"=>"hatiora.php",
    "Маммиллярия"=>"mammilyariya.php",
    "Декабрист(Шлюмбергера)"=>"dekabrist.php",
    "Адениум"=>"adenium.php",
    "Стапелия"=>"stapeliya.php",
    "Дримиопсис"=>"drimiopsis.php",
    "Сцилла"=>"scilla.php",
    "Альбукаспиральная"=>"albuka.php",
    "Кринум"=>"krinum.php",
    "Бовиэя"=>"bovieya.php",
    "Гименокаллис"=>"gimenokallis.php",
    "Кливия"=>"kliviya.php",
    "Ворслея"=>"vorsleya.php",
    "Нерине(нерина)"=>"nerine.php",
    "Валлота"=>"vallota.php",
    "Родофиала"=>"rodofiala.php",
    "Спрекелия(Шпрекелия)"=>"sprekeliya.php",
    "Зантедеския"=>"zantedeksiya.php",
    "Амариллис"=>"amarillis.php",
    "Ледебурия"=>"ledeburiya.php",
    "Зефирантес"=>"zefirantes.php",
    "Гемантус"=>"gemantus.php",
    "Кислица(Оксалис)"=>"kislica.php",
    "Гиппеаструм"=>"gipeastrum.php",
    "Вельтгеймия"=>"veltgeymiya.php",
    "Индийскийлук(птицемлечникхвостатый)"=>"indoyskiyluk.php"
);

//Параметры подключения к исходной странице

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
<style>
    body{
        margin: 0;
        padding: 0;
    }
    a{
        text-decoration: none;
        color: black;
    }

    .paginator{
        display: flex;
        margin-top: 4%;
        width: 95%;
        padding: 10px 20px 10px 20px;
        background-color: rgba(94, 97, 122, 0.35);
        justify-content: space-around;
        position: fixed;
        bottom: 0;
    }

    .paginator a{
        padding: 5px 5px 5px 5px;
        border: solid 1px;
    }
</style>
<body>

<div class="menu">
    <input type="checkbox" id="burger-checkbox" class="burger-checkbox">
    <label for="burger-checkbox" class="burger"></label>
    <ul class="menu-list">
        <li><a href="ampelnie1.php" class="menu-item">Ампельные растения</a><li>
        <li><a href="bonsaj1.php" class="menu-item">Бонсай</a><li>
        <li><a href="bromelivie1.php" class="menu-item">Бромелиевые</a><li>
        <li><a href="kaktusi1.php" class="menu-item">Кактусы</a><li>
        <li><a href="lukovichnie1.php" class="menu-item">Луковичные</a><li>
    </ul>
</div>
<div style="font-size: 130%; position: absolute; top: 1%; right: 1%; color: black;"><b>Категория "Ампельные"</b></div>

<div class="plant_cards" style="margin-bottom: 100px;">
    <?php
    //обход элементов массива и вывод информации в карточку растения
    foreach ($posts as $number => $info){

        if($info['title'] != ''){
            $title =  trim(str_replace(" ","",$info['title']));
            echo('<div class="card">
        <text style="text-align: center;"><img width="293" height="155" src="');
            echo $info['img_src'];
            echo('"></text><h1><a href="'.$links[$title].'">');
            echo $info['title'];
            echo ("</a></h1><span>");
            echo $info['description'];
            echo ("</span></div>");
        }

    }
    ?>
</div>
<div class="paginator">
    <a href="ampelnie1.php" style="text-decoration: underline;">1</a>
    <a href="ampelnie2.php">2</a>
    <a href="ampelnie3.php">3</a>
</div>
</body>
</html>