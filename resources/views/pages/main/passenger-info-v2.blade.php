@php
    $html_tag_data = ["scrollspy"=>"true"]
@endphp

@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Passenger Info Form',
    'description'=> '',
    'breadcrumbs' => []
])

@section('style')
    <link rel="stylesheet" href="{{ asset('css/flags.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.standalone.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/tagify.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <form action="/passenger-info" method="POST" id="passengerInfoForm">
            @csrf
            @method('POST')
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                <p class="p-remove card-text text-alternate mb-4">Please fill up the form below with your
                    information.</p>

                <div class="container">
                    <div id="errorContainer" class="alert alert-danger rounded pb-1 d-none">
                        <ul id="errorListUl">
                        </ul>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="mb-3 top-label">
                            <input required class="form-control" name="first_name" id="firstNameEl"/>
                            <span>FIRST NAME</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-3 top-label">
                            <input required class="form-control" name="last_name" id="lastNameEl"/>
                            <span>LAST NAME</span>
                        </label>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="mb-3 top-label">
                            <input required class="form-control" type="text" name="dob" required
                                   id="dobEl"/>
                            <span>DATE OF BIRTH</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="mb-3 top-label">
                            <input required class="form-control" type="text" name="place_of_birth"
                                   required id="placeOfBirthEl"/>
                            <span>PLACE OF BIRTH</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 top-label">
                            <select id="genderEl" class="form-control">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                            <span>GENDER</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 top-label">
                            <select class="form-control pb-1" name="country_of_residence"
                                    id="countryEl">
                                @foreach($flags as $flag)
                                    <option value="{{$flag['iso']}}">{{$flag['country']}}</option>
                                @endforeach
                            </select>
                            <span>COUNTRY OF RESIDENCE</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="mb-3 top-label">
                            <input required class="form-control" name="passport_no" id="passportNoEl"/>
                            <span>PASSPORT NO</span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3 top-label">
                            <input required class="form-control" type="text" name="issue_date" required
                                   id="issueDateEl"/>
                            <span>ISSUE DATE</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3 top-label">
                            <input required class="form-control" type="text" name="expiry_date" required
                                   id="expiryDateEl"/>
                            <span>EXPIRY DATE</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3 top-label">
                            <input required class="form-control" type="text" name="arrival_date" required
                                   id="arrivalDateEl"/>
                            <span>ARRIVAL DATE</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="mb-3 top-label">
                            <input class="form-control" name="profession" id="professionEl"/>
                            <span>PROFESSION</span>
                        </label>

                    </div>
                    <div class="col-md-4">
                        <label class="mb-3 top-label">
                            <input class="form-control" name="organization" id="organizationEl"/>
                            <span>ORGANIZATION</span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="mb-3 top-label">
                            <select id="visaDurationEl" name="visa_duration" class="form-control">
                                @for($i=1; $i <= 90; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <span>VISA DURATION (BY DAYS)</span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="mb-3 top-label">
                            <select id="visaStatusEl" name="visa_status" class="form-control">
                                <option value="0">Single</option>
                                <option value="1">Multiple</option>
                            </select>
                            <span>VISA STATUS</span>
                        </label>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Personal Picture</label>
                            <input required type="file" name="personal_pic" id="personalPicEl"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Passport Picture</label>
                            <input required type="file" name="passport_pic" id="passportPicEl"
                                   class="form-control"/>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="mb-3 top-label">
                            <select class="form-control" name="have_companion" id="haveCompEl">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <span>DO YOU HAVE A COMPANION ?</span>
                        </label>
                    </div>
                </div>
                <div id="companionContainerEl" class="d-none">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="mb-3 top-label">
                                <input required class="form-control" name="companion[first_name]" id="firstNameElComp"/>
                                <span>FIRST NAME</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3 top-label">
                                <input required class="form-control" name="companion[last_name]" id="lastNameElComp"/>
                                <span>LAST NAME</span>
                            </label>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="mb-3 top-label">
                                <input required class="form-control" type="text" name="companion[dob]" required
                                       id="dobElComp"/>
                                <span>DATE OF BIRTH</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="mb-3 top-label">
                                <input required class="form-control" type="text" name="companion[place_of_birth]"
                                       required id="placeOfBirthElComp"/>
                                <span>PLACE OF BIRTH</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 top-label">
                                <select id="genderElComp" class="form-control">
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                                <span>GENDER</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 top-label">
                                <select class="form-control pb-1" name="companion[country_of_residence]"
                                        id="countryElComp">
                                    @foreach($flags as $flag)
                                        <option value="{{$flag['iso']}}">{{$flag['country']}}</option>
                                    @endforeach
                                </select>
                                <span>COUNTRY OF RESIDENCE</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="mb-3 top-label">
                                <input required class="form-control" name="companion[passport_no]"
                                       id="passportNoElComp"/>
                                <span>PASSPORT NO</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 top-label">
                                <input required class="form-control" type="text" name="companion[issue_date]" required
                                       id="issueDateElComp"/>
                                <span>ISSUE DATE</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 top-label">
                                <input required class="form-control" type="text" name="companion[expiry_date]" required
                                       id="expiryDateElComp"/>
                                <span>EXPIRY DATE</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 top-label">
                                <input required class="form-control" type="text" name="companion[arrival_date]" required
                                       id="arrivalDateElComp"/>
                                <span>ARRIVAL DATE</span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="mb-3 top-label">
                                <input class="form-control" name="companion[profession]"
                                       id="professionElComp"/>
                                <span>PROFESSION</span>
                            </label>

                        </div>
                        <div class="col-md-4">
                            <label class="mb-3 top-label">
                                <input class="form-control" name="companion[organization]"
                                       id="organizationElComp"/>
                                <span>ORGANIZATION</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="mb-3 top-label">
                                <select id="visaDurationElComp" name="companion[visa_duration]" class="form-control">
                                    @for($i=1; $i <= 90; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <span>VISA DURATION (BY DAYS)</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="mb-3 top-label">
                                <select id="visaStatusElComp" name="companion[visa_status]" class="form-control">
                                    <option value="0">Single</option>
                                    <option value="1">Multiple</option>
                                </select>
                                <span>VISA STATUS</span>
                            </label>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Personal Picture</label>
                                <input required type="file" name="companion[personal_pic]" id="personalPicElComp"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Passport Picture</label>
                                <input required type="file" name="companion[passport_pic]" id="passportPicElComp"
                                       class="form-control"/>
                            </div>
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
    <script src="{{ asset('js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
@endsection

@section('js_page')
    <script>
        // Passenger Elements
        const firstNameEl = $(`#firstNameEl`);
        const lastNameEl = $(`#lastNameEl`);
        const dobEl = $(`#dobEl`);
        const placeOfBirthEl = $(`#placeOfBirthEl`);
        const genderEl = $(`#genderEl`);
        const countryEl = $(`#countryEl`);
        const passportNoEl = $(`#passportNoEl`);
        const issueDateEl = $(`#issueDateEl`);
        const expiryDateEl = $(`#expiryDateEl`);
        const arrivalDateEl = $(`#arrivalDateEl`);
        const professionEl = $(`#professionEl`);
        const organizationEl = $(`#organizationEl`);
        const visaDurationEl = $(`#visaDurationEl`);
        const visaStatusEl = $(`#visaStatusEl`);
        const personalPicEl = $(`#personalPicEl`);
        const passportPicEl = $(`#passportPicEl`);


        // Companion Elements
        const firstNameElComp = $(`#firstNameElComp`);
        const lastNameElComp = $(`#lastNameElComp`);
        const dobElComp = $(`#dobElComp`);
        const placeOfBirthElComp = $(`#placeOfBirthElComp`);
        const genderElComp = $(`#genderElComp`);
        const countryElComp = $(`#countryElComp`);
        const passportNoElComp = $(`#passportNoElComp`);
        const issueDateElComp = $(`#issueDateElComp`);
        const expiryDateElComp = $(`#expiryDateElComp`);
        const arrivalDateElComp = $(`#arrivalDateElComp`);
        const professionElComp = $(`#professionElComp`);
        const organizationElComp = $(`#organizationElComp`);
        const visaDurationElComp = $(`#visaDurationElComp`);
        const visaStatusElComp = $(`#visaStatusElComp`);
        const personalPicElComp = $(`#personalPicElComp`);
        const passportPicElComp = $(`#passportPicElComp`);

        const pageForm = $(`#passengerInfoForm`);
        const errors = [];

        setupPageContent()
        validation()
        submitValidation()

        function setupPageContent() {
            $(`#haveCompEl`).on('change', function () {
                if ($(this).val() === 'true')
                    $(`#companionContainerEl`).removeClass('d-none');
                else
                    $(`#companionContainerEl`).addClass('d-none');
            });

            setupDatePicker(
                dobEl,
                placeOfBirthEl,
                issueDateEl,
                expiryDateEl,
                arrivalDateEl,
                dobElComp,
                placeOfBirthElComp,
                issueDateElComp,
                expiryDateElComp,
                arrivalDateElComp
            )
        }

        function validation() {
            $(phoneNumberInput).on('keypress', function (event) {
                if ($(phoneNumberInput).val().length < 10)
                    return 48 <= event.which && event.which <= 57;

                return false;
            });

            englishAvailable(
                firstNameEl,
                lastNameEl,
                firstNameElComp,
                lastNameElComp,
                passportNoEl,
                passportNoElComp
            )
        }

        function submitValidation() {
            $(pageForm).on('submit', function (e) {
                e.preventDefault();
                let validated = true;

                validated = futurePrevent([
                    placeOfBirthEl,
                    issueDateEl,
                    placeOfBirthElComp,
                    issueDateElComp
                ], [
                    'Place of birth',
                    'Issue date',
                    'Place of birth (companion)',
                    'Issue date (companion)',
                ]);

                validated = pastPrevent([
                    expiryDateEl,
                    arrivalDateEl,
                    expiryDateElComp,
                    arrivalDateElComp
                ], [
                    'Expiry date',
                    'Arrival date',
                    'Expiry date (companion)',
                    'Arrival date (companion)',
                ]);

                validated = preventLessThanSix([
                    passportNoEl,
                    passportNoElComp
                ], [
                    'Passport No',
                    'Passport No (companion)'
                ]);

                if (!validated) {
                    errorValidation();
                    return false;
                }
                console.log("kkkkkk")
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

        function setupDatePicker(...elements) {

            elements.forEach(function (el, index) {
                $(el).datepicker({
                    autoclose: true,
                });
            });
        }

        function englishAvailable(...elements) {
            elements.forEach(function (el, index) {
                $(el).on('keypress', function (event) {
                    let ew = event.which;
                    if (ew === 32)
                        return true;
                    if (48 <= ew && ew <= 57)
                        return true;
                    if (65 <= ew && ew <= 90)
                        return true;
                    return 97 <= ew && ew <= 122;
                });
            });
        }

        function futurePrevent(elements, names) {
            let validated = true;

            elements.forEach(function (el, index) {
                let pickedDate = new Date($(el).val());
                let nowDate = new Date();
                nowDate.setHours(0, 0, 0, 0);

                if (pickedDate > nowDate) {
                    errors.push(`${names[index]} field must not be a future date`);
                    validated = false;
                }
            });

            return validated;
        }

        function pastPrevent(elements, names) {
            let validated = true;

            elements.forEach(function (el, index) {
                let pickedDate = new Date($(el).val());
                let nowDate = new Date();
                nowDate.setHours(0, 0, 0, 0);

                if (pickedDate < nowDate) {
                    errors.push(`${names[index]} field must not be a past date`);
                    validated = false;
                }
            });

            return validated;
        }

        function preventLessThanSix(elements, names) {
            let validated = true;

            elements.forEach(function (el, index) {
                if ($(el).length < 6) {
                    errors.push(`${names[index]} field must not be less than 6 characters`);
                    validated = false;
                }
            });

            return validated;
        }
    </script>
@endsection