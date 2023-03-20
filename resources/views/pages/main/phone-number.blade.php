@php
    $html_tag_data = ["scrollspy"=>"true"]
@endphp

@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Phone Number Form',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => []
])

@section('style')
    <link rel="stylesheet" href="{{ asset('css/flags.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/tagify.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <form action="" method="POST" id="phoneNumberForm">
            @csrf
            @method('POST')
            <div class="card-body">
                <h5 class="card-title">Phone Number & OTP Information</h5>
                <p class="p-remove card-text text-alternate mb-4">Please provide you phone number and OTP</p>

                <div class="container">
                    <div id="errorContainer" class="alert alert-danger rounded pb-1 d-none">
                        <ul id="errorListUl">
                        </ul>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <div class="input-group mb-5">
                                <button class="btn btn-primary dropdown-toggle" id="countryCodeEl" type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <span id="countryCodeIconEl" class="fi fi-gr"></span>
                                    <span id="countryNumberIconEl" class="mx-3">+93</span>
                                    <input type="hidden" id="countryCodeInput" name="country_code" value="+93">
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($flags as $flag)
                                        <li><a data-event="countryCodeFlag" data-iso="{{$flag['iso']}}"
                                               data-country="{{$flag['country']}}" data-code="{{$flag['code']}}"
                                               class="dropdown-item" href="#"><span
                                                        class="fi fi-{{$flag['iso']}}"> </span>
                                                <span>+{{ $flag['code'] }}</span>
                                                <span>{{ $flag['country'] }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <input required type="text" class="form-control" id="phoneNumberEl" name="phone_number"
                                       aria-label="Text input with dropdown button"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">OTP</label>
                            <input class="form-control" name="otp" id="otpEl" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end border-0 pt-1">
                <button class="btn btn-icon btn-icon-end btn-primary btn-next" id="submitBtn" type="submit">
                    <span>Submit</span>
                    <i data-acorn-icon="chevron-right"></i>
                </button>
            </div>
        </form>
    </div>
@endsection

@section('js_vendor')
    <script src="{{ asset('js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/vendor/tagify.min.js') }}"></script>
@endsection

@section('js_page')
    <script>
        const phoneNumberInput = $(`#phoneNumberEl`);
        const otpInput = $(`#otpEl`);
        const pageForm = $(`#phoneNumberForm`);
        const errors = [];

        setupTelInput()
        validation()
        submitValidation()

        function setupTelInput() {
            const countryCodeEl = $('#countryCodeIconEl');

            $('[data-event]').on('click', function () {
                $(countryCodeEl).removeAttr('class');
                $(countryCodeEl).addClass(`fi fi-${$(this).data('iso')}`);
                $(countryCodeEl).attr('val', `+${$(this).data('code')}`);
                $("#countryNumberIconEl").html(`+${$(this).data('code')}`)
                $("#countryCodeInput").val(`+${$(this).data('code')}`)
            });
        }

        function validation() {
            $(phoneNumberInput).on('keypress', function (event) {
                if ($(phoneNumberInput).val().length < 10)
                    return 48 <= event.which && event.which <= 57;

                return false;
            });

            $(otpInput).on('keypress', function (event) {
                if ($(otpInput).val().length < 4) {
                    let ew = event.which;
                    if (ew === 32)
                        return false;
                    if (48 <= ew && ew <= 57)
                        return true;
                    if (65 <= ew && ew <= 90)
                        return true;
                    if (97 <= ew && ew <= 122)
                        return true;
                    return false;
                }

                return false;
            });

        }

        function submitValidation() {
            $(pageForm).on('submit', function (e) {
                e.preventDefault();
                let validated = true;

                if ($(otpInput).val().length < 4) {
                    errors.push("OTP must contain only 4 chars at most.");
                    validated = false;
                }

                if (!validated) {
                    console.log(e)
                    errorValidation();
                    return false;
                }
                $(this).unbind('submit');
                $(this).submit();
            });
        }

        function errorValidation() {
            const errorContainer = $(`#errorContainer`)
            const errorListUl = $(`#errorListUl`)

            $(errorContainer).removeClass('d-none');
            errors.forEach(function (error, index) {
                $(errorListUl).append(`
                    <li>${error}</li>
                `);
            });
        }
    </script>
@endsection