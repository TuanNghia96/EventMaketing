<?php

namespace App\Services;

use App\Jobs\SendTicketMail;
use App\Models\Buyer;
use App\Models\Comment;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserService implements UserServiceInterface
{
    /**
     * search event with param
     *
     * @param $param
     * @return bool
     */
    public function update($param)
    {

        $user = User::find(\Auth::user()->id);
        $buyer = Buyer::find(\Auth::user()->user->id);
        DB::beginTransaction();
        try {
        unset($param['password']);
        if (isset($param['avatar'])) {
            $image = $param['avatar'];
            $name = $buyer->buyer_code . '.' . $image->getClientOriginalExtension();

            if(File::exists(public_path('/images/buyers/' . $name))) {
                File::delete(public_path('/images/buyers/' . $name));
            }
            if ($image->move(public_path('/images/buyers'), $name)) {
                $param['avatar'] = '/images/buyers/' . $name;
            }
        }
        $user->update($param);
        $buyer->update($param);
        DB::commit();
        return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}