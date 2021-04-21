$ composer install
$ touch database/database.sqlite
$ cp .env.example .env (put absolute path for DB_DATABASE)
$ php artisan key:generate
$ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
$ php artisan migrate
$ php artisan db:seed 
$ cp path_to_books.json storage/app (you can skip and go straight to book update via auth)
