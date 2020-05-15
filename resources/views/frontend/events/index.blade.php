@extends('layouts.frontend.app')

@section('content')

    <search-event
            bg-url="{{ asset('frontend/images/img_bg_8.jpg') }}"
            all-type="{{ json_encode(\App\Models\Event::TYPE) }}"
            all-classify="{{ json_encode(\App\Models\Event::$classify) }}"
            url="{{ route('event.search') }}"
            url-event="{{ route('event.detail', 0) }}"
            all-event="{{ json_encode($events) }}"
    >
    </search-event>
    {{--<div class="row row-bottom-padded-md">
        <div class="col-md-12">
            <ul id="fh5co-gallery-list">

                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-1.jpg') }}); ">
                    <a href="images/gallery-1.jpg">
                        <div class="case-studies-summary">
                            <span>14 Photos</span>
                            <h2>Two Glas of Juice</h2>
                        </div>
                    </a>
                </li>
                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-2.jpg') }}); ">
                    <a href="#" class="color-2">
                        <div class="case-studies-summary">
                            <span>30 Photos</span>
                            <h2>Timer starts now!</h2>
                        </div>
                    </a>
                </li>


                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-3.jpg') }}); ">
                    <a href="#" class="color-3">
                        <div class="case-studies-summary">
                            <span>90 Photos</span>
                            <h2>Beautiful sunset</h2>
                        </div>
                    </a>
                </li>
                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-4.jpg') }}); ">
                    <a href="#" class="color-4">
                        <div class="case-studies-summary">
                            <span>12 Photos</span>
                            <h2>Company's Conference Room</h2>
                        </div>
                    </a>
                </li>

                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-5.jpg') }}); ">
                    <a href="#" class="color-3">
                        <div class="case-studies-summary">
                            <span>50 Photos</span>
                            <h2>Useful baskets</h2>
                        </div>
                    </a>
                </li>
                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-6.jpg') }}); ">
                    <a href="#" class="color-4">
                        <div class="case-studies-summary">
                            <span>45 Photos</span>
                            <h2>Skater man in the road</h2>
                        </div>
                    </a>
                </li>

                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-7.jpg') }}); ">
                    <a href="#" class="color-4">
                        <div class="case-studies-summary">
                            <span>35 Photos</span>
                            <h2>Two Glas of Juice</h2>
                        </div>
                    </a>
                </li>

                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-8.jpg') }}); ">
                    <a href="#" class="color-5">
                        <div class="case-studies-summary">
                            <span>90 Photos</span>
                            <h2>Timer starts now!</h2>
                        </div>
                    </a>
                </li>
                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('frontend/images/gallery-9.jpg') }}); ">
                    <a href="#" class="color-6">
                        <div class="case-studies-summary">
                            <span>56 Photos</span>
                            <h2>Beautiful sunset</h2>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>--}}
@endsection

@section('inline_css')
    <link rel="stylesheet" href="{{ asset('frontend/css/searchBar.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
@endsection

@section('inline_script')
    <script src="{{ asset('frontend/js/extention/choices.js') }}"></script>

    <script>
        const customSelects = document.querySelectorAll("select");
        const deleteBtn = document.getElementById('delete')
        const choices = new Choices('select',
            {
                searchEnabled: false,
                removeItemButton: true,
                itemSelectText: '',
            });
        for (let i = 0; i < customSelects.length; i++) {
            customSelects[i].addEventListener('addItem', function (event) {
                if (event.detail.value) {
                    let parent = this.parentNode.parentNode
                    parent.classList.add('valid')
                    parent.classList.remove('invalid')
                } else {
                    let parent = this.parentNode.parentNode
                    parent.classList.add('invalid')
                    parent.classList.remove('valid')
                }
            }, false);
        }
        deleteBtn.addEventListener("click", function (e) {
            e.preventDefault()
            const deleteAll = document.querySelectorAll('.choices__button')
            for (let i = 0; i < deleteAll.length; i++) {
                deleteAll[i].click();
            }
        });

    </script>
@endsection
