# laravel-init
Learnig Laravel project


### Utils Commands

```bash
# create Laravel project
composer create-project laravel/laravel

# run serve
php artisan serve
```
### Installing Bootstrap
Navigate to your Laravel project and run the following command:

```bash
composer require laravel/ui
```

**If not Bootstrap scaffolding installed successfully**:
- After successfully installing the package, we install Bootstrap 4 in our application using the following command:

  ```bash
  php artisan ui bootstrap
  ```
  You can also install the auth scaffoldings using the following command instead:
  ```bash
  php artisan ui bootstrap --auth
  ```
Finally, you need to install the bootstrap package and the related frontend dependencies such as jquery from npm using the following command:

```bash
npm install && npm run dev
```

### Listando todas as rotas do projeto

```bash
php artisan route:list
```



### Update npm

```bash
npm install -g npm
```