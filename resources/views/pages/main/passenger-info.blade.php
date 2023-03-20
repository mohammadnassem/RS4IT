@php
    $html_tag_data = ["scrollspy"=>"true"]
@endphp

@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Passenger Info Form',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => []
])
{{--    'breadcrumbs' => ["/"=>"Home"]--}}

@section('style')
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.standalone.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/dropzone.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/flags.css') }}"/>
    <link rel="stylesheet" href="/css/vendor/tagify.css"/>
@endsection

@section('js_vendor')

    <script src="{{ asset('js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('js/cs/wizard.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="/js/vendor/tagify.min.js"></script>

@endsection

@section('js_page')
    {{--    <script src="{{ asset('js/forms/wizards.js') }}"></script>--}}
    <script src="{{ asset('js/forms/controls.datepicker.js') }}"></script>
    <script src="{{ asset('js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('js/forms/controls.dropzone.js') }}"></script>
    <script>
        const wizard = new Wizard(document.getElementById('wizardNoTopNav'), {topNav: false});


        const countryCodeEl = $('#countryCodeIconEl');

        $('[data-event]').on('click', function () {
            $(countryCodeEl).removeAttr('class');
            $(countryCodeEl).addClass(`fi fi-${$(this).data('iso')}`);
            $(countryCodeEl).attr('val', `+${$(this).data('code')}`);
        });

        $(`#dobEl`).datepicker({
            autoclose: true,
        });
        $(`#placeOfBirthEl`).datepicker({
            autoclose: true,
        });
        $(`#issueDateEl`).datepicker({
            autoclose: true,
        });
        $(`#expiryDateEl`).datepicker({
            autoclose: true,
        });
        $(`#arrivalDateEl`).datepicker({
            autoclose: true,
        });
        jQuery('#reservationRangePicker').datepicker({
            weekStart: 1,
        });
        jQuery('#reservationRangePicker input').on('change', function () {
            jQuery(this).valid();
        });
        jQuery('#extraNightRangePicker').datepicker({
            weekStart: 1,
        });
        jQuery('#extraNightRangePicker input').on('change', function () {
            jQuery(this).valid();
        });
        $(`#checkInEl`).datepicker({});
        $(`#checkOutEl`).datepicker({});
        $(`#extraCheckInEl`).datepicker({});
        $(`#extraCheckOutEl`).datepicker({});


        $(`#extraNightEl`).on('change', function () {
            if ($(this).val() === 'true')
                $(`#extraContainerEl`).removeClass('d-none');
            else
                $(`#extraContainerEl`).addClass('d-none');
        });

        $(`#firstNameEl`).on('input', function () {
            console.log('sdaljfh')
        })

        var tabEl = document.querySelector('a[data-bs-toggle="tab"]')
        tabEl.addEventListener('shown.bs.tab', function (event) {
            console.log(event.target) // newly activated tab
        })

        $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
            alert('TAB CHANGED');
        })
        $('#phoneNumberForm').on('submit', (e) => {
            console.log(e)
        });
        $(`#submitWizardBtn`).on('click', function (e) {
            e.preventDefault();
            jQuery(`[data-index="${wizard.currentIndex}"] [name]`).each(function (ind,el) {
                jQuery(el).valid();

            });
            return;
            if (wizard.currentIndex == 4) {


                $(`#noNavFirst`).removeClass('tab-pane').removeClass('fade')
                $(`#noNavSecond`).removeClass('tab-pane').removeClass('fade');
                $(`#noNavThird`).removeClass('tab-pane').removeClass('fade');
                $(`#noNavForth`).removeClass('tab-pane').removeClass('fade');
                $(`.p-remove`).html('')
            }
        })

        $(`#resetWizardBtn`).on('click', function (e) {
            window.location.reload()
        })

    </script>
    <script src="{{ asset('js/forms/validation.js') }}"></script>

@endsection

@section('content')

    <div class="card mb-5 wizard" id="wizardNoTopNav">
        <div class="card-header border-0 pb-0">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center active" href="#noNavFirst" data-index="0"
                       aria-selected="true" role="tab" data-bs-toggle="tab">
                        <div class="mb-1 title d-none d-sm-block">Phone Number</div>
                        <div class="text-small description d-none d-md-block">Verify Your Phone Number</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#noNavSecond" role="tab" data-bs-toggle="tab">
                        <div class="mb-1 title d-none d-sm-block">Personal</div>
                        <div class="text-small description d-none d-md-block">Personal Information</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#noNavThird" role="tab" data-bs-toggle="tab">
                        <div class="mb-1 title d-none d-sm-block">Companion</div>
                        <div class="text-small description d-none d-md-block">Companion Information</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#noNavForth" role="tab" data-bs-toggle="tab">
                        <div class="mb-1 title d-none d-sm-block">Reservation</div>
                        <div class="text-small description d-none d-md-block">Reservation Information</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#noNavLast" role="tab" data-bs-toggle="tab">
                        <div class="mb-1 title d-none d-sm-block">Review</div>
                        <div class="text-small description d-none d-md-block">Double Check your info</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade" id="noNavSecond" role="tabpanel">
                    <h5 class="card-title">/h5>
                    <p class="p-remove card-text text-alternate mb-4"></p>
                    <form class="tooltip-end-top" id="personalForm" novalidate>


                    </form>
                </div>
                <div class="tab-pane fade" id="noNavThird" role="tabpanel">
                    <h5 class="card-title">Companion Information</h5>
                    <p class="p-remove card-text text-alternate mb-4">Please fill up the form below with your
                        information.</p>
                    <form class="tooltip-end-top" id="companionForm" novalidate>



                    </form>
                </div>
                <div class="tab-pane fade" id="noNavForth" role="tabpanel">
                    <h5 class="card-title">Reservation Information</h5>
                    <p class="p-remove card-text text-alternate mb-4">Please fill up the form below with your
                        information.</p>
                    <form class="tooltip-end-top" id="reservationForm" novalidate>
                        <div class="row g-3 input-daterange" id="reservationRangePicker">
                            <div class="col-md-4">
                                <label class="mb-3 top-label">
                                    <input required type="text" class="form-control text-start" name="check_in"
                                           id="checkInEl"/>
                                    <span>CHECK IN</span>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-3 top-label">
                                    <input required type="text" class="form-control text-start" name="check_out"
                                           id="checkOutEl"/>
                                    <span>CHECK OUT</span>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 top-label">
                                    <select class="form-control" data-width="100%" name="room_type" id="roomTypeEl">
                                        <option label="&nbsp;"></option>
                                        <option value="0">King Bed</option>
                                        <option value="1">Twin Bed</option>
                                    </select>
                                    <span>ROOM TYPE</span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="extraNightFormContainer">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="mb-3 top-label">
                                    <select class="form-control" name="need_extra_night" id="extraNightEl">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    <span>WOULD YOU RESERVE AN EXTRA NIGHT ?</span>
                                </label>
                            </div>
                            <div id="extraContainerEl" class="d-none">
                                <form class="tooltip-end-top" id="extraNightForm" novalidate>
                                    <div class="row g-3 input-daterange" id="extraNightRangePicker">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input required type="text" class="form-control text-start"
                                                       name="extra[check_in]"
                                                       id="extraCheckInEl"/>
                                                <span>CHECK IN</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input required type="text" class="form-control text-start"
                                                       name="extra[check_out]"
                                                       id="extraCheckOutEl"/>
                                                <span>CHECK OUT</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 top-label">
                                                <select class="form-control" data-width="100%" name="extra[room_type]"
                                                        id="extraRoomTypeEl">
                                                    <option label="&nbsp;"></option>
                                                    <option value="0">King Bed</option>
                                                    <option value="1">Twin Bed</option>
                                                </select>
                                                <span>ROOM TYPE</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="noNavLast" role="tabpanel">
                    {{--                    <h5 class="card-title">Review And Submit</h5>--}}
                    {{--                    <p class="p-remove card-text text-alternate mb-4">Please fill up the form below with your information.</p>--}}
                    <form class="tooltip-end-top" id="reviewForm" novalidate>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer text-center border-0 pt-1">
            <button class="btn btn-icon btn-icon-start btn-secondary" id="resetWizardBtn" type="button">
                <i data-acorn-icon="rotate-left"></i>
                <span>Reset</span>
            </button>
            <button class="btn btn-icon btn-icon-end btn-primary btn-next" id="submitWizardBtn" type="button">
                <span>Submit</span>
                <i data-acorn-icon="chevron-right"></i>
            </button>
        </div>
    </div>
@endsection