<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use App\Services\EventServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    protected $eventService;

    /**
     * create Dependency Injection event
     *
     * @param EventServiceInterface $eventService
     */
    public function __construct(EventServiceInterface $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the events.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $events = Event::with('type', 'category')->get();
        return view('backend.events.index', compact('events'));
    }

    /**
     * Display a listing of the events are waiting.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWaiting()
    {
        $events = $this->eventService->getEventWaiting();
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
        $events = $this->eventService->getEventValidate();
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
        $event = Event::with('type', 'category')->find($id);
        return view('backend.events.detail', compact('event'));
    }

    /**
     * set success event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setSuccess($id)
    {
        $this->eventService->setEventSuccess($id);
        return redirect()->route('events.detail', $id);
    }

    /**
     * remove event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel($id)
    {
        $this->eventService->cancelEvent($id);
        return redirect()->route('events.detail', $id);
    }
}
