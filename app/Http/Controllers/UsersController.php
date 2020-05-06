<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendRegisterEmail;
use App\Events\CreatedUser;

class UsersController extends Controller
{
    protected $user;

    /**
     * create Dependency Injection user
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->user->getPaginate($request->all());
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('admin');
        $user = $this->user->addUser($request->all());

        //check add success to send mail
        if ($user) {
            event(new CreatedUser($user));
            flash('Thêm mới người dùng thành công.')->success();
        }

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id of user to edit
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('admin');
        $user = $this->user->findUser($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(StoreUserRequest $request)
    {
        $this->authorize('admin');
        if ($this->user->updateUser($request->input())) {
            flash('Cập nhật bản ghi thành công.')->success();
        } else {
            flash('Cập nhật bản ghi thất bại.')->error();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        if ($this->user->deleteUser($id)) {
            flash('Xoá bản ghi thành công.')->success();
        } else {
            flash('Xoá bản ghi thất bại.')->error();
        }
        return redirect()->route('users.index');
    }
}
