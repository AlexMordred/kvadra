# Тестовое задание для Kvadra

## Установка (linux, mac)

Выполнить в консоли из любой папки:

```
git clone https://github.com/AlexMordred/kvadra.git
cd kvadra
composer install
mv .env.example .env
```

Далее открыть файл `.env` и указать настройки БД. После этого в консоли выполнить:

```
php artisan migrate --seed
```

Будет сгенерировано 10 категорий точек со случайными именами. Наконец, запустить встроенный сервер:

```
php artisan serve
```

Можно заходить на сайт по адресу `http://localhost:8000`.