# Лабораторная работа №1 & №3

## Техническое задание
Вариант 4. Создать и заполнить произвольными данными БД для хранения информации о фильмотеке.

Для фильма задается название, жанр (может быть более чем один), год выхода, страна, качество, тип носителя (видеокассета, CD, DVD, BR). Для цифровых носителей определяется разрешение в пикселях и типы применяемых кодеков. Также для фильма может задаваться дополнительная информация, такая как: продюсер, режиссер и актеры (произвольное количество).

Сформировать запросы и вывести результаты:

- список фильмов выбранного жанра;
- список фильмов с выбранным актером;
- список фильмов за указанный временной интервал.


## Скрины
![](https://i.imgur.com/AeZs2dP.png)
> Форма без данных
---
![](https://i.imgur.com/0BOAATh.png)
> Форма с данными
---

## Функция ассинхронного запроса
```javascript
const send = async function(data, text = false) {
    return await fetch('/controllers/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then((response) => { 
        return text ? response.text() : response.json()
    });
}
```
