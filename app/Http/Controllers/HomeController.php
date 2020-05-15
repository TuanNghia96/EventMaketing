<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Enterprise;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $event;

    /**
     * Create a new controller instance.
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
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

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function getSubEvent(Request $request)
    {
        $params = $request->all();
        return $subEvents = Event::skip(5)->take($params['number'] + 6)->get();
    }

    /**
     * get
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventIndex()
    {
        $events = Event::get();
        return view('frontend.events.index', compact('events'));
    }

    /**
     * api get search ajax
     *
     * @param Request $request
     * @return \App\Models\Illuminate\Pagination\Paginator
     */
    public function eventSearch(Request $request)
    {
        $params = $request->all();
        $events = $this->event->getSearch($params);
        return $events;
    }

    /**
     * get event detail
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventDetail($id)
    {
        $event = Event::findOrFail($id);
        $event->images = json_decode($event->images);
        return view('frontend.events.detail', compact('event'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
