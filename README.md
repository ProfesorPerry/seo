# TODO

1. Module.php - method run( )
   1. Default 'page' and 'action' variables should be extracted from config.

# Using routes

As module user you can register your own routes.

It is recommended to register routes in ./routes/main.php file.

If you want, there is possibility to register routes everywhere in application.
Example of route registering:

...
```php
use Seo\Core\Router;

$router = new Router();
$router->get('/example', function () {
    echo 'Example';
});
```
For now Router class is not a singleton, so be careful with instantiating Route class.