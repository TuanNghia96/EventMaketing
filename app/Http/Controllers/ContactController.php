<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @return Factory|View
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function send(Request $request)
    {
        Comment::create($request->all());
        return redirect(route('contact'));
    }

    /**
     * @return Factory|View
     */
    public function about()
    {
        return view('frontend.about');
    }
}
