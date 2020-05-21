<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    public function chartEvent()
    {
        $events = Event::get();
        $countThisYears = Event::whereYear('public_date', '=', date('Y'))
            ->select(DB::raw('count(id) as `data`'), DB::raw('MONTH(public_date) month'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $countThisYears = array_map(function ($countThisYear) {
            return $countThisYear['data'];
        }, $countThisYears->toArray());

        $countLastYear = Event::whereYear('public_date', '=', Carbon::now()->subYear())
            ->select(DB::raw('count(id) as `data`'), DB::raw('MONTH(public_date) month'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $countLastYear = array_map(function ($countLastYear) {
            return $countLastYear['data'];
        }, $countLastYear->toArray());

        $countTypes = Event::whereYear('public_date', '=', date('Y'))
            ->select(DB::raw('count(id) as `data`'), 'type')
            ->groupBy('type')
            ->get();
        $countTypes = array_map(function ($countTypes) {
            return $countTypes['data'];
        }, $countTypes->toArray());

        $countClassify = Event::whereYear('public_date', '=', date('Y'))
            ->select(DB::raw('count(id) as `data`'), 'classify')
            ->groupBy('classify')
            ->get();
        $countClassify = array_map(function ($count) {
            return $count['data'];
        }, $countClassify->toArray());

        return view('backend.charts.event')
            ->with('countThisYears', json_encode($countThisYears))
            ->with('countLastYear', json_encode($countLastYear))
            ->with('countTypes', json_encode($countTypes))
            ->with('countClassify', json_encode($countClassify));
    }
}
