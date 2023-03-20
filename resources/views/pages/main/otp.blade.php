@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'OTP Verification',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => []
])
{{--    'breadcrumbs' => ["/"=>"Home"]--}}

@section('page-content')
    <div class="card mb-5">
        <div class="card-body">
            <p class="p-card h5 text-center">
                Please provide your email e.g. Gmail to get a link in order to be able to get your reservation.
            </p>
            <form class="d-flex justify-content-center">
                <div class="form-floating mb-3 mx-3">
                    <input id="otpEl" type="text" class="form-control text-center mb-3" placeholder="Email"/>
                    <label for="otpEl">OTP</label>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection