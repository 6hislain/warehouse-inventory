![issues](https://img.shields.io/github/issues/6hislain/warehouse-inventory) ![forks](https://img.shields.io/github/forks/6hislain/warehouse-inventory) ![stars](https://img.shields.io/github/stars/6hislain/warehouse-inventory) ![license](https://img.shields.io/github/license/6hislain/warehouse-inventory) ![php](https://img.shields.io/packagist/php-v/laravel/laravel)

# Warehouse Inventory

A (minimal viable product) project for managing stock in a warehouse

![Screenshot](public/img/screenshot.jpg)

### Requirements

-   Php 8
-   Git
-   Composer 2
-   Database: Sqlite, Mysql, Postgres

### Installation

-   `git clone https://github.com/6hislain/warehouse-inventory`
-   `cd warehouse-inventory`
-   `composer install`
-   rename and edit `.env.example` to `.env`
-   `php artisan key:generate`
-   `php artisan storage:link`
-   `php artisan migrate`
-   `php artisan serve`
