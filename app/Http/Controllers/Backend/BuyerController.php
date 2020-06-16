<?php

namespace App\Http\Controllers\Backend;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyerController extends Controller
{
    protected $buyer;

    /**
     * create Dependency Injection user
     *
     * @param Buyer $buyer
     */
    public function __construct(Buyer $buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = $this->buyer->withTrashed()->get();
        return view('backend.buyers.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->buyer->withTrashed()->with('user')->findOrFail($id);
        return view('backend.buyers.detail', compact('user'));
    }

    /**
     * delete buyer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->buyer->findOrFail($id)->user()->first();
        if ($user->disable()) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('buyers.index');
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }

    /**
     * restore buyer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $user = $this->buyer->findOrFail($id)->user()->first();

        if ($user->enable()) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('buyers.index');
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }
}
