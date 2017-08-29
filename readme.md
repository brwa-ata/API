<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Requirements
- composer , if you don't have you can download [here](https://getcomposer.org/)
- NodeJs , if you don't have you can download [here](https://nodejs.org/en/)
- If you are the _windows_ user you need a [gitbash](https://git-for-windows.github.io/) , **but** if not you don't need it
- of course you need a `localserver`, I recommend a [xampp](https://www.apachefriends.org/index.html)

## Installation
- `download` or `clone` this repository inside your _localserver_ directory on your computer 
- `create` a database in the _phpmyadmin_ or anyother that you use, _but_ **don't** create any table

## Note
### You have to create a `VertualHost` 
- for the _windows_ user go to the `C:\Windows\System32\drivers\etc` and _open_ the `hosts` file and at the _buttom  write_ `127.0.0.1	YourClonedProjectFolderName.dev` and save it, For the _mac or linux_ user if the file arcitecture is not the same as above make sure you are `googling` for it and write the same thing
- if you are using the `xampp` go to the `C:\xampp\apache\conf\extra` and open the `httpd-vhosts.conf` and write .
`<VirtualHost *:80>
	DocumentRoot "C:\xampp\htdocs\YourProjectFolderName\public"	
	ServerName YourClonedProjectFolderName.dev
</VirtualHost>`. 
For the others that **don't** use _xampp_ make sure you are `googling` for it and write the same thing
- restart your `xampp` or any _apache sever_ that you use
## Configration
- create a file by runing this command `touch .env` on the `terminal` for _mac_ or _linux_ **or** `gitbash` for _windows_ inside `cloned` project directory
- `copy` all contentn inside the `.env.example` to the `.env` that you created
- look for `DB_DATABASE` and then write your database name that you have created, and for the `DB_USERNAME` write _root_ , and for the `DB_PASSWORD` **don't** write anything if there is anything delete it
- you have to generate a key by runing this command `php artisan key:generate` on the `terminal`
- run this command `composer update` on the `terminal`
- run this command `npm install` on the `terminal`
- run this command `php artisan migrate` on the `terminal` to create the tables

## How to use
- go to the `roles` table and at least create a _role_ with the name of `administrator`
- create a _user_ at the `users` table give him/here a `role_id` of the `administrator` , and in the `is_active` column write `1`
- ope any browser and write `YourClonedProjectFolderName.dev` 
Now you can use this project
### If you have any issue of these steps you can contact me by my emai / brwa.ata.hamalaw@gmail.com , and I will response as fast as I can 
