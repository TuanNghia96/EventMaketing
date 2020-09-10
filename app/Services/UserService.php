<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserService implements UserServiceInterface
{
    /**
     * update buyer supplier account
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

                if (File::exists(public_path('/images/buyers/' . $name))) {
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

    /**
     * store admin account
     *
     * @param $params
     * @return bool
     */
    public function storeAdmin($params)
    {
        DB::beginTransaction();
        try {
            //create account
            $params['role'] = User::ADMIN;
            $user = User::create($params);

            //create admin
            $params['user_id'] = $user->id;
            $lastByr = Admin::withTrashed()->orderBy('admin_code', 'desc')->first();
            $codeLast = $lastByr->admin_code;
            $params['admin_code'] = User::getNextCode('AD', $codeLast);
            $params['birthday'] = date('Y-m-d', strtotime($params['birthday']));
            $admin = Admin::create($params);
            DB::commit();
            return $admin;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * update admin account
     *
     * @param $params
     * @return bool
     */
    public function updateAdmin($params)
    {
        DB::beginTransaction();
        try {
            //update account
            if (!isset($params['password'])) {
                unset($params['password']);
            }
            $params['role'] = User::ADMIN;
            $user = User::find(\Auth::user()->id);
            ;
            $user->update($params);

            //update admin
            $params['birthday'] = date('Y-m-d', strtotime($params['birthday']));
            $admin = Admin::find(\Auth::user()->user->id);
            $admin->update($params);
            DB::commit();
            return $admin;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}