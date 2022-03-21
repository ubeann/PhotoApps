<?php

namespace App\Controllers;

class Web extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Web',
        );
        return view('Web', $data);
    }
}
