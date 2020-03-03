<?php

namespace App\Http\Controllers\Backend;

use App\Models\Voucher;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class VoucherController extends Controller
{
    protected $voucher;

    /**
     * create Dependency Injection voucher
     *
     * @param Voucher $voucher
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $vouchers = $this->voucher->getPaginate();
        return view('backend.vouchers.index', compact('vouchers'));
    }
}
