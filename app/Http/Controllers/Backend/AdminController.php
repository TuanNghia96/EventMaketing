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
     * show admin info
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->admin->findOrFail($id);
        return view('backend.admins.detail', compact('user'));
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
        $admin = $this->userService->storeAdmin($params);
        if ($admin) {
            return redirect()->route('admin.show', $admin->id);
        } else{
            return redirect()->route('admin.create');
        }
    }
}
