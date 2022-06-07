<?php

require_once __DIR__ . '/models/model.php';
$model = new Model();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Library</title>
</head>
<body>
    <div>
        <label for="">Жанр: </label>
        <select id="genre">
            <option value="" selected disabled>Не выбрано</option>
            <? foreach ($model->getGenre() as $genre) { ?>
            <option value="<?= $genre['id'] ?>"><?= $genre['title'] ?></option>
            <? } ?>
        </select>
        <ul id="list-genre"></ul>
    </div>
    <div>
        <label for="">Актёр: </label>
        <select id="actor">
            <option value="" selected disabled>Не выбрано</option>
            <? foreach ($model->getActor() as $actor) { ?>
            <option value="<?= $actor['id'] ?>"><?= $actor['name'] ?></option>
            <? } ?>
        </select>
        <ul id="list-actor"></ul>
    </div>
    <form id="date">
        <label for="from">С</label>
        <input type="date" name="from">

        <label for="to">По</label>
        <input type="date" name="to">
        <button name="search">Найти</button>
    </form>
    <ul id="list-date"></ul>

    <script src="script.js" defer></script>
</body>
</html>