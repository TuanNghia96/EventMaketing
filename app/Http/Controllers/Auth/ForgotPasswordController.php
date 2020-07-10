<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendResetPassEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
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
     * show reset password view
     */
    public function showResetPassword()
    {
        return view('auth.reset_password');
    }

    /**
     * send email have token
     */
    public function sendResetPassword(Request $request)
    {
        $params = $request->all();
        $user = User::where('email', $params['email'])->first();
        if ($user) {
            $token = Str::random(100);
            $reset = DB::table('reset_passwords')->insert([
                'email' => $user->email,
                'token' => $token
            ]);

            dispatch(new SendResetPassEmail($user, route('password.mail', [
                'email' => $user->email,
                'token' => $token
            ])));
            alert()->success('Thành công', 'Yêu cầu đổi lại mật khẩu đang được xử lý, vui lòng kiểm tra hòm thư');
            return view('auth.reset_password');
        }
        alert()->error('Lỗi', 'Địa chỉ mail không tồn tại. Xin vui lòng kiểm tra lại');
        return redirect()->back();
    }

    /**
     * show change password view
     */
    public function passToken(Request $request)
    {
        $params = $request->all();

        $token = DB::table('reset_passwords')->where([
            'email' => $params['email'],
            'token' => $params['token'],
        ])->first();
        if($token){
            return view('auth.change_password');
        }
        alert()->error('Lỗi', 'Lỗi hệ thống');
        return redirect()->back();
    }

    /**
     * change password
     */
    public function postPassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|same:password',
        ]);

        $params = $request->all();
        $token = DB::table('reset_passwords')->where([
            'email' => $params['email'],
            'token' => $params['token'],
        ])->first();
        $user = User::where('email', $params['email'])->first();
        if($token && $user){
            $user->update([
                'password' => \Hash::make($params['password'])
            ]);
            alert()->success('Thành công', 'Đã thay đổi mật khẩu, hãy đăng nhập lại');
            return redirect()->route('login');
        }
        alert()->error('Lỗi', 'Lỗi hệ thống');
        return redirect()->back();
    }
}
