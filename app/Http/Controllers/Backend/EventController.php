<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use App\Models\Notification;
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
        $events = Event::with('type', 'category', 'comments')->get();
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
     * Display a listing of the event have ready to cancel.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDelete(Request $request)
    {
        $events = $this->eventService->getEventDelete();
        return view('backend.events.cancel', compact('events'));
    }

    /**
     * Display a listing of the event have validated.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDetail(Request $request, $id)
    {
        $params = $request->all();
        if (isset($params['noti'])) {
            $notification = Notification::find($params['noti']);
            $notification->read();
        }
        $event = Event::with('type', 'category', 'comments', 'mainSupplier', 'suppliers', 'buyer')->findOrFail($id);
        $statuses = Event::$status;
        return view('backend.events.detail', compact('event', 'statuses'));
    }

    /**
     * set success event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setSuccess($id)
    {
        if ($this->eventService->setEventSuccess($id)) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('events.detail', $id);
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }

    /**
     * remove event
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Request $request)
    {
        $params = $request->all();
        if ($this->eventService->cancelEvent($params)) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('events.detail', $params['id']);
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }
}
