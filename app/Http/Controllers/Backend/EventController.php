<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    protected $event;

    /**
     * create Dependency Injection event
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $events = $this->event->getPaginate($request->all());
        return view('backend.events.index', compact('events'));
    }
}
