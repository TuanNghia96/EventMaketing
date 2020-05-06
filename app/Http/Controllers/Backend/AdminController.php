<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $admin;

    /**
     * create Dependency Injection user
     *
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
//        $this->middleware('classable', ['only' => ['create', 'index', 'store']]);
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = $this->admin->getPaginate($request->all());
        return view('backend.admins.index', compact('users'));
    }
}
