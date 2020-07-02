<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supplier;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    protected $supplier;

    /**
     * create Dependency Injection user
     *
     * @param Supplier $supplier
     */
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->supplier->withTrashed()->get();
        return view('backend.suppliers.index', compact('users'));
    }

    /**
     * Display a listing of the supplier.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->supplier->withTrashed()->with('user')->findOrFail($id);
        $cites = supplier::CITY;
        return view('backend.suppliers.detail', compact('user', 'cites'));
    }

    /**
     * block supplier
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $supplier = $this->supplier->findOrFail($id)->user()->first();
        if ($supplier->disable()) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('suppliers.index');
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }


    /**
     * restore supplier
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $supplier = $this->supplier->findOrFail($id)->user()->first();
        if ($supplier->enable()) {
            alert()->success('Thành công', 'Đã thay đổi thành công.');
            return redirect()->route('suppliers.index');
        }
        alert()->error('Lỗi', 'Bạn đã gặp lỗi, xin thử lại');
        return redirect(url()->previous());
    }
}
