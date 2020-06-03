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
     * Display a listing of the events.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $events = $this->event->with('type', 'category')->getPaginate($request->all());
        return view('backend.events.index', compact('events'));
    }

    /**
     * Display a listing of the events are waiting.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWaiting(Request $request)
    {
        $events = $this->event->with('type', 'category')->where('status', Event::STATUS[0])->orderBy('public_date')->get();
        return view('backend.events.waiting', compact('events'));
    }

    /**
     * Display a listing of the event have validated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getValidated(Request $request)
    {
        $events = $this->event->with('type', 'category')->where('status', '!=', Event::$status[0])->orderBy('public_date')->get();
        return view('backend.events.validated', compact('events'));
    }

    /**
     * Display a listing of the event have validated.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDetail($id)
    {
        $event = $this->event->with('type', 'category')->find($id);
//        dd($event);
        return view('backend.events.detail', compact('event'));
    }

    /**
     * set success event
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setSuccess($id)
    {
        $event = $this->event->with('type', 'category')->find($id);
        if ($event->status == 0){
            $event->update(['status' => 1]);
        }

        return view('backend.events.detail', compact('event'));
    }

    /**
     * remove event
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeEvent($id)
    {
        $event = $this->event->with('type', 'category')->find($id);
        if ($event->status != 3){
            $event->update(['status' => 3]);
        }

        return view('backend.events.detail', compact('event'));
    }
}
