# Laravel Interactions

_Work In Progress_

An interactions package for Laravel. 

## Requirements

Make sure all dependencies have been installed before moving on:

* [Laravel](https://laravel.com/) >= 5.7
* [PHP](https://php.net/manual/en/install.php) >= 7.2
* [Composer](https://getcomposer.org/download/)

## Install

Via Composer:

``` bash
$ composer require olumby/interactions
```

## Usage

Generate an Interaction via the command:

``` bash
$ php artisan make:interaction InteractionName
```

Using the option `--method` will create an interaction class with a rules method rather than simple property (see below).

This will create an empty interaction that extends the base interaction class.

```php
namespace DummyNamespace;

use Lumby\Interactions\Interaction;

class InteractionName extends Interaction
{
    /**
     * Rules to validate the interaction.
     */
    protected $rules = [];

    /**
     * Handle the interaction.
     *
     * @return mixed
     */
    public function execute()
    {
        //
    }
}

```

Next include the CallsInteractions trait in your base controller, this will allow you to use the `interact` and `interaction` functions in all of your controllers.

```php
...
use Lumby\Interactions\CallsInteractions;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CallsInteractions;
}
```

Now from a controller you can call the interaction.

```php
...

class MyController extends Controller
{
    public function store(Request $request)
    {
        return $this->interaction(RequestName::class, $data, $arguments);
    }
}

...
```
