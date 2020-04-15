@extends('layouts.frontend.app')

@section('content')

    <search-event
            bg-url="{{ asset('frontend/images/img_bg_8.jpg') }}"
            all-type="{{ json_encode(\App\Models\Event::TYPE) }}"
            all-classify="{{ json_encode(\App\Models\Event::$classify) }}"
            url="{{ route('event.search') }}"
    >
    </search-event>
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
