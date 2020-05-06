<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Buyer;
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
        $users = $this->buyer->getPaginate($request->all());
        return view('backend.buyers.index', compact('users'));
    }
}
