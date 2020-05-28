<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

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
     * get contact view
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * store comment
     *
     * @param ContactStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactStoreRequest $request)
    {
        Comment::create($request->all());
        return redirect(route('home'));
    }

    /**
     * get view about
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('frontend.about');
    }
}
