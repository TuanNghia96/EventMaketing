<?php

namespace App\Http\Controllers\Backend;

use App\Models\Comment;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    /**
     * get chart of event
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
            ->select(DB::raw('count(id) as `data`'), 'type_id')
            ->groupBy('type_id')
            ->get();
        $countTypes = array_map(function ($countTypes) {
            return $countTypes['data'];
        }, $countTypes->toArray());

        $countCategory = Event::whereYear('public_date', '=', date('Y'))
            ->select(DB::raw('count(id) as `data`'), 'category_id')
            ->groupBy('category_id')
            ->get();
        $countCategory = array_map(function ($count) {
            return $count['data'];
        }, $countCategory->toArray());

        $events = [
            'total' => Event::count(),
            'end' => Event::where('end_date', '>', now()->format('Y-m-d H:i:s'))->count(),
            'comments' => Comment::count(),
            'tickets' => DB::table('tickets')->count(),
        ];

        return view('backend.charts.event', compact('events'))
            ->with('countThisYears', json_encode($countThisYears))
            ->with('countLastYear', json_encode($countLastYear))
            ->with('countTypes', json_encode($countTypes))
            ->with('countCategory', json_encode($countCategory))
            ->with('types', json_encode(\App\Models\Type::pluck('name')->toArray()))
            ->with('categories', json_encode(\App\Models\Category::pluck('name')->toArray()));
    }

    /**
     * get calendar events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function calendar()
    {
        $events = Event::get()->toArray();
        $status = Array(
            Event::WAITING => 'fc-default',
            Event::VALIDATED => 'fc-primary',
            Event::PUBLIC => 'fc-success',
            Event::CANCEL => 'fc-danger',
        );
        $events = array_map(function ($event) use ($status) {
            return [
                'title' => $event['name'],
                'start' => Carbon::parse($event['public_date']),
                'allDay' => false,
                'url' => route('events.detail', $event['id']),
                'className' => $status[$event['status']],
            ];
        }, $events);
        $events = json_encode($events);
        return view('backend.charts.calendar', compact('events'));
    }
}
