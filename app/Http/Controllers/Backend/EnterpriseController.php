<?php

namespace App\Http\Controllers\Backend;

use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnterpriseController extends Controller
{
    protected $enterprise;

    /**
     * create Dependency Injection user
     *
     * @param Enterprise $enterprise
     */
    public function __construct(Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = $this->enterprise->getPaginate($request->all());
        return view('backend.enterprises.index', compact('users'));
    }
}
