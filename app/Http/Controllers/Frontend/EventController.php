<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Jobs\SendTicketMail;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Enterprise;
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
     * api get search ajax
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eventEpSearch(Request $request)
    {
        $params = $request->all();
        return $this->eventService->getEpSearch($params);
    }

    /**
     * get event detail
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventDetail($id)
    {
        $event = Event::active()->with('coupon')->with('buyer')->with('comments')->findOrFail($id);
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
        $user = Buyer::with('events')->findOrFail(\Auth::user()->user->id);
        return view('frontend.events.list', compact('user'));
    }

    /**
     * get user events list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enterpriseEvent()
    {
        $user = Enterprise::with(['events', 'mainEvent'])->findOrFail(\Auth::user()->user->id);
        return view('frontend.events.list', compact('user'));
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
     * @return Event
     */
    public function getSubEvent(Request $request)
    {
        return $this->eventService->getMore($request->all());
    }

    /**
     * Show form input data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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


    /**
     * get event review
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventReview($id)
    {
        $event = Event::with('buyer')->findOrFail($id);
        return view('frontend.events.detail', compact('event'));
    }

    /**
     * check ticket
     *
     * @param $number
     * @return void
     */
    public function checkQR($number)
    {
        $arr = explode('-', $number);
        $buyer = Buyer::with('events')->where('buyer_code', $arr[0])->first();
        $event = $buyer->events->find($arr[1]);
        if ($buyer && $event && (!$event->pivot->enterprise_id) && ($event->pivot->qrcode_check == $number)) {
            $event->pivot->enterprise_id = \Auth::user()->user->id;
            $event->pivot->save();
            alert()->success('Thành công', 'Vé tồn tại');
        } else{
            alert()->error('Thất bại', 'Vé lỗi');
        }
        return view('frontend.events.ticket');
    }

    /**
     * post comment
     *
     * @param Request $request
     * @return void
     */
    public function postComment(Request $request)
    {
        $params = $request->all();
        if($this->eventService->storeComment($params)) {
            alert()->success('Thành công', 'Đánh giá hoàn thành');
        } else{
            alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        }
        return redirect(route('event.detail', $params['event_id']));
    }
}
