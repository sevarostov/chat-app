## REST API for chat app 

## Technical Requirements & Installation

[PHP 8.2](https://www.php.net/releases/8.2/en.php)
[Composer (System Requirements)](https://getcomposer.org/doc/00-intro.md#system-requirements)
[Laravel 11.33.2](https://laravel.com/docs/11.x)
[MySql8.0](https://hub.docker.com/r/mysql/mysql-server#!)

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

## Aliasing the sail

```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

## Building the project

```
sail build
```

## Create database schema

```
sail artisan migrate
```

## Testing

```
sail artisan test
```

