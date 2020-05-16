<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
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
     * Show the application dashboard.
     *
     * @return
     */
    public function createEvent()
    {
        return view('frontend.events.create');
    }

    public function postEvent(EventStoreRequest $request)
    {
        $params = $request->all();

        \DB::beginTransaction();
        //code
        $code = Event::withTrashed()->orderBy('code', 'desc')->first()->code;
        $params['code'] = $code + 1;

        //format date
        $params['public_date'] = date('Y-m-d H:i:s', strtotime($params['public_date']));;
        $params['start_date'] = date('Y-m-d H:i:s', strtotime($params['start_date']));;
        $params['end_date'] = date('Y-m-d H:i:s', strtotime($params['end_date']));;

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
        return redirect(route('event.detail', $event->id));
    }
}
