<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Jobs\SendTicketMail;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Type;
use App\Services\EventServiceInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;

    /**
     * Create a new controller instance.
     *
     * @param EventServiceInterface $eventService
     */
    public function __construct(EventServiceInterface $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * get
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventIndex()
    {
        $events = Event::get();
        $types = Type::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();
        return view('frontend.events.index', compact('events', 'types', 'categories'));
    }

    /**
     * api get search ajax
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eventSearch(Request $request)
    {
        $params = $request->all();
        return $this->eventService->getSearch($params);
    }

    /**
     * get event detail
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventDetail($id)
    {
        $event = Event::active()->with('coupon')->with('buyer')->findOrFail($id);
        return view('frontend.events.detail', compact('event'));
    }

    /**
     * get join event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function joinEvent($id)
    {
        $this->eventService->join($id);
        return redirect(route('event.detail', $id));
    }

    /**
     * get buyer events list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buyerEvent()
    {
        $buyer = Buyer::with('events')->findOrFail(\Auth::user()->user->id);
        return view('frontend.events.buyer', compact('buyer'));
    }

    /**
     * resend ticket to buyer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function resendTicket($id)
    {
        $this->eventService->resend($id);
        return redirect(route('event.buyer'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function getSubEvent(Request $request)
    {
        return $this->eventService->getSubEvent($request->all());
    }

    /**
     * Show form input data
     *
     * @return
     */
    public function createEvent()
    {
        $types = Type::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();
        $coupons = Coupon::distinct('value')->pluck('id', 'value');
        return view('frontend.events.create', compact('types', 'categories', 'coupons'));
    }


    /**
     * store event data
     *
     * @param EventStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEvent(EventStoreRequest $request)
    {
        $event = $this->eventService->post($request->all());
        if ($event) {
            alert()->success('Thành công', 'Sự kiện đã tạo hoàn thành');
            return redirect(route('event.review', $event->id));
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(route('event.create'));
    }
}
