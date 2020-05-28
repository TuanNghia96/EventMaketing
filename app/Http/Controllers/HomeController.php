<?php

namespace App\Http\Controllers;

use App\Jobs\SendTicketMail;
use App\Models\Buyer;
use App\Models\Enterprise;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $events = Event::active()->orderBy('id')->take(5)->get();
        $subEvents = Event::active()->skip(5)->take(6)->get();
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
        return $subEvents = Event::active()->skip(5)->take($params['number'] + 6)->get();
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eventSearch(Request $request)
    {
        $params = $request->all();
        \Log::info($this->event->getSearch($params));
        return $this->event->getSearch($params);
//        return Event::first();
    }

    /**
     * get event detail
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventDetail($id)
    {
        $event = Event::active()->with('buyer')->findOrFail($id);
        $event->images = json_decode($event->images);
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
        $event = Event::active()->with('buyer')->findOrFail($id);

        if (!$event->buyer->find(Auth::user()->user->id)) {
            DB::beginTransaction();
            $check = Auth::user()->user->buyer_code . '-' . $event->code . '-' . rand(100000, 999999);
            $image = \QrCode::format('png')
                ->size(200)
                ->generate(route('event.checkQR', $check));
            $output_file = '/public/img/qr-code/' . $check . '.png';
            \Storage::disk('local')->put($output_file, $image);

            $event->buyer()->attach([Auth::user()->user->id => ['qrcode_check' => $check]]);
            dispatch(new SendTicketMail(Auth::user()->email, Auth::user()->user->toArray(), $event, asset('storage/img/qr-code/' . $check . '.png')));
            DB::commit();
        }
        return redirect(route('event.detail', $event->id));
    }

    /**
     * get un join event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unJoinEvent($id)
    {
        $event = Event::active()->with('buyer')->findOrFail($id);

        if ($event->buyer->find(Auth::user()->user->id) && ($event->status == Event::VALIDATED)) {
            DB::beginTransaction();
            try {
                $event->buyer()->detach(Auth::user()->user->id);
            } catch (Exception $e) {
                DB::rollBack();

                throw new Exception($e->getMessage());
            }
            DB::commit();
        }
        return redirect(route('event.detail', $event->id));

    }

    /**
     * get un join event
     *
     * @param $number
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function checkQR($number)
    {
        $this->authorize('admin');
        $arr = explode('-', $number);
        $buyer = Buyer::with('events')->where('buyer_code', $arr[0])->first();
        $event = $buyer->events->find($arr[1]);
        if ($buyer && $event && !$event->pivot->is_used && ($event->pivot->qrcode_check == $number)) {
            $event->pivot->is_used = !$event->pivot->is_used;
            $event->pivot->save();
        }
        dd($event);
    }

    /**
     * get contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public
    function contact()
    {
        return view('frontend.contact');
    }
}
