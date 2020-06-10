<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
