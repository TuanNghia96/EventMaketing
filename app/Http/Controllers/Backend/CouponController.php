<?php

namespace App\Http\Controllers\Backend;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CouponController extends Controller
{
    protected $coupon;

    /**
     * create Dependency Injection coupon
     *
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $coupons = $this->coupon->with('event')->get();
        return view('backend.coupons.index', compact('coupons'));
    }
}
