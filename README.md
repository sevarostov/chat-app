## REST API for chat app 

## Technical Requirements & Installation

[PHP 8.3](https://www.php.net/releases/8.3/en.php)
[Composer (System Requirements)](https://getcomposer.org/doc/00-intro.md#system-requirements)
[Laravel 11.33.2](https://laravel.com/docs/11.x)
[MySql8.0](https://hub.docker.com/r/mysql/mysql-server#!)
[Scribe](https://github.com/knuckleswtf/scribe)

## Settings

#### Copy file `.env.example` to `.env` 
```
$ cp .env.example .env
```

#### Make Composer install the project's dependencies into vendor/

```
$ composer install
```

## Generate key
```
php artisan key:generate
```

## Alias the sail

```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

## Build the project

```
sail build
```

## Create database schema

```
sail artisan migrate
```

## Run tests

```
sail artisan test
```

