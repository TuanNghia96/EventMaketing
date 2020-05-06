<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    /**
     * show view hello world
     *
     * @return view
     */
    public function show()
    {
        return view('hello_world/show');
    }
}
