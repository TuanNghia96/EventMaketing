<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdminStoreRequest;
use App\Models\Admin;
use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $admin;
    protected $userService;

    /**
     * create Dependency Injection user
     *
     * @param Admin $admin
     * @param UserServiceInterface $userService
     */
    public function __construct(Admin $admin, UserServiceInterface $userService)
    {
        $this->admin = $admin;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the admin.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->admin->get();
        return view('backend.admins.index', compact('users'));
    }

    /**
     * view create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.admins.create');
    }

    /**
     * store admin account
     *
     * @param AdminStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminStoreRequest $request)
    {
        $params = $request->all();
        $this->userService->storeAdmin($params);
        return redirect()->route('admin.index');
    }
}
