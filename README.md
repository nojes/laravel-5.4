
# Laravel Employees demo

[![Build Status](https://travis-ci.org/nojes/laravel-5.4.svg?branch=master)](https://travis-ci.org/nojes/laravel-5.4)

> [Laravel Employees](https://github.com/nojes/laravel-employees) package demo on Laravel version 5.4.*

### Installation

1. Clone repository:
```bash
$ git clone -b demo-employees https://github.com/nojes/laravel-5.4.git laravel-employees
```

2. Go to repository dir:
```bash
$ cd laravel-employees
```

#### Manual:

3.1. Install dependencies:
```bash
$ composer install
```

3.2. Modify `.env` with your details. These are the minimum settings that you need to fill in:
    - `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

3.3. Run init command
```bash
$ php artisan app:init
```

3.4. If you don't have Nginx or Apache, you may run the PHP's built-in HTTP-server:
```bash
$ php artisan serve
```

or 

#### Docker:

3.1 Build docker containers and run them:
```bash
$ docker-compose build && docker-compose up -d
```

3.2. Run init command inside a container:
```bash
$ docker-compose exec app php artisan app:init
```

4. :heavy_check_mark: Go to [http://localhost](http://localhost)

> For access the container use `$ docker-compose exec app bash` command
