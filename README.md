# Livewire TODO


A simple TODO list app built with Laravel Livewire. The main objective of this project is to provide an example application for those who are starting with Laravel Livewire.

  - Create tasks.
  - Edit tasks.
  - Delete tasks.
  - Complete tasks.
  - Restore tasks.

### Tech

Technologies used in this project:

* [Laravel](https://github.com/laravel/laravel) - The Laravel PHP framework.
* [Livewire](https://github.com/livewire/livewire) - Laravel Livewire.
* [Tailwind CSS](https://tailwindcss.com/) - Tailwind CSS.
* [Apline.js](https://github.com/alpinejs/alpine) - Alpine.js.


### Requirements

* [PHP 8.1+](https://www.php.net/) - PHP version 8.1 or greater.
* [Composer](https://getcomposer.org/download/) - Latest version of composer v2 or greater.
* [npm](https://www.npmjs.com/) - Latest version of npm v10 or greater.


### Installation

1. Clone the `main` branch of this repo

2. Install the dependencies and devDependencies:

```sh
$ cd todo-demo
$ composer install
$ npm install
$ npm run dev
```

3. Create your .env file and generate the application key:

```sh
$ cp .env.example .env
$ php artisan key:generate
```

4. Run migrations (mysql table name "demo_todo") and start the server:

```sh
$ php artisan migrate
$ php artisan serve
```

License
----

MIT
