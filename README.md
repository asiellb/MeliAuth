# Farena MeliAuth
[![GitHub issues](https://img.shields.io/github/issues/farena/MeliAuth.svg?style=plastic)](https://github.com/farena/MeliAuth/issues)
[![GitHub forks](https://img.shields.io/github/forks/farena/MeliAuth.svg?style=plastic)](https://github.com/farena/MeliAuth/network)
[![GitHub stars](https://img.shields.io/github/stars/farena/MeliAuth.svg?style=plastic)](https://github.com/farena/MeliAuth/stargazers)

## Introduction
MeliAuth is a Laravel Wrapper for MercadoLibre PHP SDK.

## Installation
To get started simply run:
    
    composer require farena/meli-auth
    

If you are using Laravel 5.5+, there is no need to manually register the service provider. However, if you are using an earlier version of Laravel, register the `MeliAuthServiceProvider` in your `app` configuration file:

```php
'providers' => [
    // Other service providers...

    Farena\MeliAuth\MeliAuthServiceProvider::class,
],
```

## Basic Usage 
Once installed you need to configure some variables.
The easy way to do that is overriding config variables with .env file.

    MELI_CLIENT_ID=55555555555555
    MELI_CLIENT_SECRET=HqLgOas38dY872dY872Dwyi
    MELI_CALLBACK_URI=https://my.host.com/meli/callback // The host must be equal to your MercadoLibre APP config
    MELI_SUCCESS_REDIRECT=home // Named route of your app
    MELI_SITE=MLA // MercadoLibre Site
    
In the example we will auth on MercadoLibre Argentina (MLA), don't forget to change this because MLA is the default config.

I recommend use the .env file. But you can publish the config file too:
    
    php artisan vendor:publish
    
Just select "Provider: Farena\MeliAuth\MeliAuthServiceProvider" and you will have a copy of MeliAuth.php config file on App/Config.

Then you can see the new routes:

    php artisan route:list
    
    +--------+----------+-----------------+---------------+------------------------------------------------------------+--------------+
    | Domain | Method   | URI             | Name          | Action                                                     | Middleware   |
    +--------+----------+-----------------+---------------+------------------------------------------------------------+--------------+
    |        | GET|HEAD | meli/authorize  | MeliAuthorize | Farena\MeliAuth\Http\Controllers\MeliAuthController@auth      | web          |
    |        | GET|HEAD | meli/callback   |               | Farena\MeliAuth\Http\Controllers\MeliAuthController@callback  | web          |
    +--------+----------+-----------------+---------------+------------------------------------------------------------+--------------+

When you need the user to authorize the app just make a button or link to MeliAuthorize route, this will redirect the user to MercadoLibre Login Page and ask if authorize your app to connect to the account.

If the user agreed he will be redirected to 'MELI_SUCCESS_REDIRECT=home' (You can change the named route) with a session variable named 'MeliData' with all the session info bringed from MercadoLibre.

If not agreed or if any error, he will be redirected to same route, but you will have another session variable named 'MeliErrorData'.


## License

Farena MeliAuth is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

You can use, copy, modify, merge, publish and distribute. If any issue please report them and if you can contribute pull request are accepted.