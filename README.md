

## Instalation

### Database and Tenancy


For production:

``` 
php artisan migrate --force
```

For development:

```
php artisan migrate --force --seed
```

> The flag --force is used to create database if not exists.

In develop, after migrate, can be used migrate:fresh para reset schemas and data.

```
php artisan migrate:fresh --seed
```

> If you are using sail with docker remember of use  ./vendor/bin/sail before comands php artisan.

