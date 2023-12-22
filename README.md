

## Instalation

### Database and Tenancy


For production:

``` bash
php artisan migrate --force
```

For development:

```bash
php artisan migrate --force --seed
```

> The flag --force is used to create database if not exists.

In develop, after migrate, can be used migrate:fresh para reset schemas and data.

```bash
php artisan migrate:fresh --seed
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