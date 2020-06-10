<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contacts;

class ContactController extends Controller
{
    protected $contact;

    /**
     * Create a new controller instance.
     *
     * @param Contacts $contact
     */
    public function __construct(Contacts $contact)
    {
        $this->contact = $contact;
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
     * store contact
     *
     * @param ContactStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactStoreRequest $request)
    {
        $this->contact->create($request->all());
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
