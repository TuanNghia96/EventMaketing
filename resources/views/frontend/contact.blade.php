@extends('layouts.frontend.app')

@section('background_header')
    <div class="page-header contact-page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 class="entry-title">Contact.</h1>
                </header>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="contact-form">
                <form method="post" class="row" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="col-12 col-md-3">
                        @guest()
                            <input type="text" id="fname" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                        @else
                            <input type="text" id="fname" name="name" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}" readonly required>
                        @endguest
                    </div>
                    <div class="col-12 col-md-3">
                        @guest()
                            <input type="text" id="" name="phone" class="form-control" placeholder="Phone number" value="{{ old('phone') }}">
                        @else
                            <input type="text" id="" name="phone" class="form-control" placeholder="Phone number" value="{{ Auth::user()->user->phone }}" readonly>
                        @endguest
                    </div>
                    <div class="col-12 col-md-3">
                        @guest()
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @else
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                        @endguest
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}" required>
                    </div>
                    <div class="col-12"><textarea placeholder="Message" name="message" rows="8">{{ old('message') }}</textarea></div>
                    <div class="col-12 flex justify-content-center"><input class="btn gradient-bg" type="submit" value="Send Message"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                    <p>Join our database NOW!</p>
                </header>

                <div class="newsletter-form">
                    <form class="flex flex-wrap justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3">
                            <input type="text" placeholder="Name">
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <input type="email" placeholder="Your e-mail">
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <input class="btn gradient-bg" type="submit" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
