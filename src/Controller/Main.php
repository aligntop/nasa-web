<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Main
{

    public function index()
    {
        return new Response('Holaaa!', 200);
    }

}
