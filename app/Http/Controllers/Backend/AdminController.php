<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('admin.show', $admin->id);
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect()->route('admin.create');
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
     * view create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        $admin = Admin::findOrFail(Auth::user()->user->id);
        return view('backend.admins.edit', compact('user', 'admin'));
    }

    /**
     * update admin account
     *
     * @param AdminUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateRequest $request)
    {
        $params = $request->all();
        $admin = $this->userService->updateAdmin($params);
        if ($admin) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('admin.show', $admin->id);
        } else {
            alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
            return redirect()->route('admin.edit');
        }
    }
}
