<?php

namespace Farena\MeliAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Farena\MeliAuth\vendors\Meli\Meli;

class MeliAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /*
    * Send Credentials to MercadoLibre
    * to authorize entry to the account.
    */
    public function auth()
    {
        $meli = new Meli(config('MeliAuth.client_id'), config('MeliAuth.client_secret'));

        //  Don't forget to change the $AUTH_URL value to match your user's Site Id.
        $redirectUrl = $meli->getAuthUrl(config('MeliAuth.callback_uri'), Meli::$AUTH_URL[config('MeliAuth.site')]);

        return redirect($redirectUrl);
    }

    /*
    * Catch MercadoLibre response
    * to the authorization request.
    * And redirect to configured route
    * with data stored on session variable.
    */
    public function callback()
    {
        $meli = new Meli(config('MeliAuth.client_id'), config('MeliAuth.client_secret'));
        $res = $meli->authorize(request()->code, config('MeliAuth.callback_uri'));

        if ($res['httpCode'] == 200){
            // Storing response to a session variable.
            session(['MeliData' => $res]);

            // Redirecting to especified route.
            return redirect(route(config('MeliAuth.success_redirect')));
        } else {
            // Storing response to a session variable.
            session(['MeliErrorData' => $res['body']->message]);

            // Redirecting to especified route.
            return redirect(route(config('MeliAuth.success_redirect')));
        }
    }
}