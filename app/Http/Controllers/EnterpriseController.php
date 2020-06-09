<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class EnterpriseController extends Controller
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
        $params = $request->all();
        \DB::beginTransaction();
        //code
        $code = Event::withTrashed()->orderBy('code', 'desc')->first()->code;
        $params['code'] = $code + 1;

        //format date
        $params['public_date'] = date('Y-m-d H:i:s', strtotime($params['public_date'] . ' ' . $params['public_time']));
        $params['start_date'] = date('Y-m-d H:i:s', strtotime($params['start_date'] . ' ' . $params['start_time']));
        $params['end_date'] = date('Y-m-d H:i:s', strtotime($params['end_date'] . ' ' . $params['end_time']));

        //save event avatar
        $avatar = $params['avatar'];
        $name = $params['code'] . '_av.' . $avatar->getClientOriginalExtension();
        if ($avatar->move(public_path('/images/events'), $name)) {
            $params['avatar'] = '/images/events/' . $name;
        }

        //save image
        if (isset($params['images'])) {
            foreach ($params['images'] as $key => $value) {
                $image = $value['image'];
                $name = $params['code'] . '_image_' . $key . '.' . $image->getClientOriginalExtension();
                if ($image->move(public_path('/images/events'), $name)) {
                    $params['images'][$key]['image'] = '/images/events/' . $name;
                }
            }
            $params['images'] = json_encode($params['images']);
        }

        //create event
        $event = Event::create($params);
        //attach event to enterprise
        Auth::user()->user->events()->sync([$event->id => ['role' => 1]]);
        \DB::commit();
        return redirect(route('event.review', $event->id));
    }


    /**
     * get event detail
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventReview($id)
    {
        $event = Event::with('buyer')->findOrFail($id);
        $event->images = json_decode($event->images);
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
        if ($buyer && $event && !$event->pivot->is_used && ($event->pivot->qrcode_check == $number)) {
            $event->pivot->is_used = !$event->pivot->is_used;
            $event->pivot->save();
        }
    }
}
