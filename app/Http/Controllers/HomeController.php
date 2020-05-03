<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::take(5)->get();
        return view('fontend.index', compact('events'));
    }

    public function download()
    {
        for ($x = 47; $x <= 50; $x++) {
            $url =
                "https://placeimg.com/1500/1000/" . $x;

            $img = 'fakers/images/img_bg_' . $x . '.jpg';

            file_put_contents($img, file_get_contents($url));
        }

        echo "File downloaded!";
    }
}
