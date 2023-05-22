<h1 align="center">Rest-Api Project News Management (Bali Indo Tower Test) </h1>

## Author

Laravel 10 pepustakaan dibuat oleh :

- Github : <a href="https://github.com/yusufrhmntdev"> Yusuf Rahmanto </a>


## Fitur 

- Autentikasi Admin dan User Dengan Laravel Passport
- CRUD News  Dengan Event Listener (created, updated,
and deleted) dan Respon Api Menggunakan Resource
- Create Comments dengan Redis Queue (Wajib Instal Redis, untuk pengguna windows silahkan unduh disini : https://github.com/microsoftarchive/redis/releases')


## User

**Admin**

- email: admin@example.com
- Password: @baliIndoTower

**User**

- email: user@example.com
- Password: @baliIndoTower


## Install

**Clone Repository**

```bash
git clone https://github.com/yusufrhmntdev/bali-indo-tower-test.git
```

**Download zip**

```bash
extract file zip
```

## Buka di kode editor


## Install composer

```bash
composer install
```



## Buka Web Server


## Buat database di localhost 

```bash
nama database : bali_tower_indo_test
```

## Setting database di .env

```bash
DB_PORT=3306
DB_DATABASE=perpustakaan_laravel_8
DB_USERNAME=root
DB_PASSWORD=
```

## Generate key

```bash
php artisan key:generate
```

## Jalankan migrate / import database

```bash
php artisan migrate  /  gunakan fitur import database , database telah disediakan di dalam folder aplikasi (bali_tower_indo_test.sql)
```



## Intsal Redis, untuk pengguna windows silahkan unduh disini : https://github.com/microsoftarchive/redis/releases') , lalu tambahkan Settingan di berikut di .ENV
```REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_CLIENT=predis

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis
SESSION_DRIVER=file
SESSION_LIFETIME=120

```


## Jalankan Serve

```bash
php artisan serve
```
## Lalu Test Dengan Postman di Link Berikut
`https://elements.getpostman.com/redirect?entityId=13584469-1b1c99b0-abc7-4eee-99b0-e7979b558f87&entityType=collection`



## License

- Copyright © 2023 Yusuf Rahmanto.
