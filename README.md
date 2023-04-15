#### Kurulum
Composer install:

```sh
composer install
```
Hata alınması durumunda bu seçenekler kullanılabilir:
```sh
composer update

composer install --ignore-platform-reqs
```
Dataların oluşması için:

```sh
php artisan db:seed --class=DatabaseSeeder
```

Taskların providerlerden çekilmesi için:

```sh
php artisan app:get-new-task
```
