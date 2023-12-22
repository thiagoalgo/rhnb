

## Instalation

To prepare the development envirioment you can access the oficial documentation of [Laravel](https://laravel.com/docs/10.x/installation#docker-installation-using-sail). This project was developed using Docker and Sail.

### Database and Tenancy

Grant privilegies to sail user on docker. Firstly, access MySQL instance:

```shell
docker-compose exec mysql bash
```

Now access mysql cli:

```shell
mysql -u root -p
```

> The default password is `password`

To finish, execute both bellow commands:

```shell
GRANT ALL PRIVILEGES ON *.* TO 'sail'@'%';
FLUSH PRIVILEGES;
```
Ready, you can exit from mysql cli using `quit` command and exit from MySQL Docker instance using `exit` command.

Now, we should be run migrations to create databases and populate initial data.

#### For production:

```shell
sail php artisan migrate --force
```

#### For development:

```shell
sail php artisan migrate --force --seed
```

> The flag --force is used to create database if not exists.

In develop, after migrate, can be used `migrate:fresh` to reset schemas and data.

```shell
sail php artisan migrate:fresh --seed
```

> If you are using sail with docker remember of use  ./vendor/bin/sail before comands php artisan.


### Permission (Authorization)

The authorization system is based in Gates and Policies of Laravel.

All Gates are defined in AuthServiceProvider and are checked in association with "role" property of User model.

To protect a route should be used the "can" middleware in route declaration like this:

```php
Route::get('/departments', Departments::class)->name('departments')->middleware('can:manage-departments');
```

To protect a action (method) in livewire component shoud be used the "authorize" method of livewire Component class like this:

```php
$this->authorize('manage-departments');
```

