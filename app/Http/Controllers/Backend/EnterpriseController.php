<?php

namespace App\Http\Controllers\Backend;

use App\Models\Enterprise;
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
     * Display a listing of the enterprise.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->enterprise->withTrashed()->get();
        return view('backend.enterprises.index', compact('users'));
    }

    /**
     * Display a listing of the enterprise.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->enterprise->withTrashed()->with('user')->findOrFail($id);
        $cites = Enterprise::CITY;
        return view('backend.enterprises.detail', compact('user', 'cites'));
    }

    /**
     * block enterprise
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $enterprise = $this->enterprise->findOrFail($id);
        $enterprise->delete();
        return redirect()->route('enterprises.index');
    }


    /**
     * restore enterprise
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $enterprise = $this->enterprise->withTrashed()->findOrFail($id);
        $enterprise->restore();
        return redirect()->route('enterprises.index');
    }
}
