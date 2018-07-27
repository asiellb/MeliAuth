<?php
namespace Farena\MeliAuth;

use Farena\MeliAuth\vendors\Meli\Meli;

class MeliAuth extends Meli {
    public function __construct($accesToken,$refreshToken=null)
    {
        parent::__construct(config('MeliAuth.client_id'), config('MeliAuth.client_secret'),$accesToken,$refreshToken);
    }
}