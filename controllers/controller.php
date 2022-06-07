<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/models/model.php');

$model = new Model();
$_POST = json_decode(file_get_contents('php://input'), true);
$res = '';

switch($_POST['event']) {
    case 'genre':
        foreach($model->getFilmByGenre($_POST['id']) as $film) {
            $res .= '<li>Название: ' . $film['name'] . 
            ';<br> Дата выхода: ' . date('d.m.Y', strtotime($film['date'])) .
            ';<br> Страна: ' . $film['country'] .
            ';<br> Качество: ' . $film['quality'] . 
            ';<br> Разрешение: ' . ($film['resolution'] ? $film['resolution'] : 'Не указано') .
            ';<br> Кодек: ' . ($film['codec'] ? $film['codec'] : 'Не указано') .
            ';<br> Продюсер: ' . $film['producer'] .
            ';<br> Режисёр: ' . $film['director'] .
            ';<br> Носитель: ' . $film['carrier'] .
            '</li><br>';
        }
        echo json_encode($res);
        break;
    case 'actor':
        foreach($model->getFilmByActor($_POST['id']) as $film) {
            $res .= '<li>Название: ' . $film['name'] . 
            '; Дата выхода: ' . date('d.m.Y', strtotime($film['date'])) .
            '; Страна: ' . $film['country'] .
            '; Качество: ' . $film['quality'] . 
            '; Разрешение: ' . ($film['resolution'] ? $film['resolution'] : 'Не указано') .
            '; Кодек: ' . ($film['codec'] ? $film['codec'] : 'Не указано') .
            '; Продюсер: ' . $film['producer'] .
            '; Режисёр: ' . $film['director'] .
            '; Носитель: ' . $film['carrier'] .
            '</li>';
        }
        $res = '<?xml version="1.0" encoding="UTF-8" ?>
        <document>' .
            $res
        . '</document>';
        echo $res;
        break;
    case 'date':
        foreach($model->getFilmByDate($_POST['from'], $_POST['to']) as $film) {
            $res .= '<li>Название: ' . $film['name'] . 
            ';<br> Дата выхода: ' . date('d.m.Y', strtotime($film['date'])) .
            ';<br> Страна: ' . $film['country'] .
            ';<br> Качество: ' . $film['quality'] . 
            ';<br> Разрешение: ' . ($film['resolution'] ? $film['resolution'] : 'Не указано') .
            ';<br> Кодек: ' . ($film['codec'] ? $film['codec'] : 'Не указано') .
            ';<br> Продюсер: ' . $film['producer'] .
            ';<br> Режисёр: ' . $film['director'] .
            ';<br> Носитель: ' . $film['carrier'] .
            '</li><br>';
        }
        echo $res;
        break;
}

?>