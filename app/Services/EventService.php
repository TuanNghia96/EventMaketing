<?php

namespace App\Services;

use App\Jobs\SendTicketMail;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventService implements EventServiceInterface
{
    /**
     * search event with param
     *
     * @param array $input input data to search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSearch($input)
    {
        $query = Event::with('coupon');

        //check like
        if (isset($input['name'])) {
            $query->where('name', 'like', '%' . $input['name'] . '%')->orWhere('title', 'like', '%' . $input['name'] . '%');
        }
        //check input to type
        if (isset($input['type'])) {
            $query->where('type_id', $input['type']);
        }
        //check input to classify
        if (isset($input['category'])) {
            $query->where('category_id', $input['category']);
        }
        //check input to coupon
        if (isset($input['coupon'])) {
            //started
            if ($input['coupon'] == 1) {
                $query->where('coupon_id', null);
            } else {
                $query->where('coupon_id', '<>', null);
            }
        }
        //check input to status
        if (isset($input['status'])) {
            //started
            if ($input['status'] == 1) {
                $query->where('start_date', '>', now());
            } else {
                $query->where('start_date', '<', now())->where('end_date', '>', now());
            }
        }
        return $query->active()->get();
    }

    /**
     * join event of buyer
     *
     * @param $id
     */
    public function join($id)
    {
        $event = Event::active()->with('coupon')->with('buyer')->findOrFail($id);
        if ($event->buyer->count() >= $event->ticket_number) {
            alert()->warning('Cảnh báo', 'Đã hết vé');
        } elseif (!$event->buyer->find(Auth::user()->user->id)) {
            DB::beginTransaction();
            try {
                $check = Auth::user()->user->buyer_code . '-' . $event->code . '-' . rand(100000, 999999);
                $image = \QrCode::format('png')
                    ->size(200)
                    ->generate(route('event.checkQR', $check));
                $output_file = '/public/img/qr-code/' . $check . '.png';
                \Storage::disk('local')->put($output_file, $image);

                $event->buyer()->attach([Auth::user()->user->id => ['qrcode_check' => $check]]);
                dispatch(new SendTicketMail(Auth::user()->email, Auth::user()->user->toArray(), $event, asset('storage/img/qr-code/' . $check . '.png')));
                DB::commit();
                alert()->success('Thành công', 'Vé đã gửi. Vui lòng kiểm tra hòm thư');
            } catch (\Exception $e) {
                DB::rollBack();
                alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
            }
        } else {
            alert()->warning('Cảnh báo', 'Bạn đã tham gia sự kiện');
        }
    }

    /**
     * resend ticket
     *
     * @param $id
     */
    public function resend($id)
    {
        $event = Event::active()->with('buyer')->findOrFail($id);
        $ticket = $event->buyer->find(Auth::user()->user->id);
        if ($ticket) {
            $check = $ticket->pivot->qrcode_check;
            dispatch(new SendTicketMail(
                Auth::user()->email,
                Auth::user()->user->toArray(),
                $event,
                asset('storage/img/qr-code/' . $check . '.png')
            ));
            alert()->success('Thành công', 'Vé đã gửi. Vui lòng kiểm tra hòm thư');
        } else {
            alert()->warning('Cảnh báo', 'Bạn chưa tham gia sự kiện');
        }
    }

    /**
     * get more event
     *
     * @param $params
     */
    public function getMore($params)
    {
        Event::active()->with('coupon')
            ->orderBy('point', 'desc')->skip(5)->take($params['number'] + 6)->get();
    }

    /**
     * get event status waiting
     *
     * @return Event[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEventWaiting()
    {
        return Event::with('type', 'category')
            ->where('status', Event::$status[0])->orderBy('public_date')->get();
    }

    /**
     * get event status validated
     *
     * @return Event[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEventValidate()
    {
        return Event::with('type', 'category')
            ->where('status', Event::$status[0])->orderBy('public_date')->get();
    }

    /**
     * set event success
     *
     * @param $id
     */
    public function setEventSuccess($id){
        $event = Event::with('type', 'category')->find($id);
        if ($event->status == 0){
            $event->update(['status' => 1]);
        }
    }

    /**
     * set event cancel
     *
     * @param $id
     */
    public function cancelEvent($id){
        $event = Event::with('type', 'category')->find($id);
        if ($event->status != 3){
            $event->update(['status' => 3]);
        }
    }

    /**
     * save event data
     *
     * @param $params
     * @return mixed
     */
    public function post($params)
    {
        DB::beginTransaction();
        //code
        try {
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
            \Auth::user()->user->events()->sync([$event->id => ['role' => 1]]);
            DB::commit();
            return $event;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}