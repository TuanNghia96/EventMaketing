<?php

namespace App\Http\Controllers\Auth;

use App\Models\Buyer;
use App\Models\Enterprise;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            isset($data['role']) ? (
            $data['role'] == User::ENTERPRISE ? [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6'],
                'confirmpassword' => ['required', 'string', 'min:6', 'same:password'],
                'role' => ['required'],
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bank_account' => ['required', 'string', 'min:12'],
                'phone' => ['required', 'string', 'min:10'],
                'address' => ['required', 'string', 'max:255'],
            ] : [
                'last_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6'],
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'confirmpassword' => ['required', 'string', 'min:6', 'same:password'],
                'city' => ['nullable', 'string', 'in:' . implode(',', array_keys(Enterprise::CITY))],
                'role' => ['required'],
                'bank_account' => ['nullable', 'string', 'min:12'],
                'phone' => ['required', 'string', 'min:10'],
                'address' => ['required', 'string', 'max:255'],
            ]
            ) : []
        );
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create($data);
            $data['user_id'] = $user->id;
            if ($data['role'] == User::ENTERPRISE) {
                //make code
                $lastEnp = Enterprise::withTrashed()->orderBy('enterprise_code', 'desc')->first();
                $codeLast = $lastEnp->enterprise_code;
                $data['enterprise_code'] = User::getNextCode('EP', $codeLast);

                //save enterprise avatar
                $image = $data['avatar'];
                $name = $data['enterprise_code'] . '.' . $image->getClientOriginalExtension();
                if ($image->move(public_path('/images/enterprise'), $name)) {
                    $data['avatar'] = '/images/enterprise/' . $name;
                }
                //create
                Enterprise::create($data);
            } else {
                //make code
                $lastByr = Buyer::withTrashed()->orderBy('buyer_code', 'desc')->first();
                $codeLast = $lastByr->buyer_code;
                $data['buyer_code'] = User::getNextCode('BY', $codeLast);

                //save buyer avatar
                $image = $data['avatar'];
                $name = $data['buyer_code'] . '.' . $image->getClientOriginalExtension();
                if ($image->move(public_path('/images/buyers'), $name)) {
                    $data['avatar'] = '/images/buyers/' . $name;
                }
                //create
                Buyer::create($data);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $user;
    }
}
