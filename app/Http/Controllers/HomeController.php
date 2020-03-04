<?php

namespace App\Http\Controllers;

use App\Models\Backend\Buyer;
use App\Models\Backend\Enterprise;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index()
    {
        $events = Event::take(5)->get();
        $subEvents = Event::skip(5)->take(6)->get();
        $webInfo = [
            'buyer' => Buyer::count(),
            'event' => Event::where('end_date', '<', Carbon::now())->count(),
            'enterprise' => Enterprise::count(),
        ];
            return view('frontend.index', compact('events', 'subEvents', 'webInfo'));
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

    public function contact()
    {
        return view('frontend.contact');
    }
}
