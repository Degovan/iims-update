## Installation Guide
* Pull/Clone From Remote Git
```
git remote add origin git@gitlab.com:Yepi/inventory.git
git pull origin master
```
```
git clone git@gitlab.com:Yepi/inventory.git/
```

* Install Dependencies
```
composer install
```

* Setup Project
```
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

* Run Server
```
php artisan serve
```
