<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * show user info
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInfo()
    {
        $user = \Auth::user()->user;
        $types = Type::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();
        return view('frontend.users.show', compact('user', 'types', 'categories'));
    }

    /**
     * show form edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = \Auth::user()->user;
        $types = Type::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();
        return view('frontend.users.edit', compact('user', 'types', 'categories'));
    }

    /**
     * update user info
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserUpdateRequest $request)
    {
        $array = $request->all();
        $user = User::find(\Auth::user()->id);
        $buyer = Buyer::find(\Auth::user()->user->id);
        if ($user && $buyer) {
            unset($array['password']);
            $user->update($array);
            $buyer->update($array);
            alert()->success('Thành công', 'Thay đổi thông tin cá nhân thành công');
        } else {
            alert()->error('Thất bại', 'Không thể thay đổi. Xin thử lại.');
        }
        return redirect()->route('users.info');
    }
}
