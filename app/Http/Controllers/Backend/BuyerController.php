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
        $buyer = $this->buyer->findOrFail($id);
        $buyer->delete();
        return redirect()->route('buyers.index');
    }

    /**
     * restore buyer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $buyer = $this->buyer->withTrashed()->findOrFail($id);
        $buyer->restore();
        return redirect()->route('buyers.index');
    }
}
