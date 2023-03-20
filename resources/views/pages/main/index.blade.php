@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Horizontal Starter Page';
$description= 'An empty page with a boxed horizontal layout.';
$breadcrumbs = ["/"=>"Home"]
@endphp


@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Email Page',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => []
])

@section('style')
@endsection
@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection
@section('js_page')
    <script src="/js/pages/sendEmail.js"></script>
@endsection
@section('content')
    <div class="card mb-5">
        <div class="card-body">
            <p class="p-card h5 text-center">
                We've sent a verification code to the phone number you provided, check your messages to get it.
            </p>
            <form class="d-flex justify-content-center" id="sendEmailForm" method="post" novalidate action='{{route('storeEmail')}}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-floating mb-3 mx-3"    >
                    <input id="email" name="email" type="email" class="form-control mb-3" placeholder="Email"/>
                    <label for="emailEl">Your email</label>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection