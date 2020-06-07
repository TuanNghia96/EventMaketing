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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->enterprise->get();
        return view('backend.enterprises.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = Enterprise::with('user')->findOrFail($id);
        return view('backend.enterprises.detail', compact('user'));
    }
}
